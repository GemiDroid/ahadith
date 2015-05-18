<?php
    //function to log all the changes in the database in a single page visit
    function log_queries() {
        $CI =& get_instance();
        
        $log = NULL;
        
        //get a list of all the queries executed so far
        $queries = $CI->db->queries;
        
        //if some queries were actually executed, iterate through them
        if( count($queries) != 0 ):
            foreach($queries as $key => $query):
                //skip logging of queries for ci_sessions and last_activity of user table
                if( strpos( $query, "ci_sessions") !== FALSE OR strpos( $query, "last_activity") !== FALSE ):
                    continue;
                endif;
                
                //add to log array only if the query for INSERT, UPDATE or DELETE
                if( strpos( $query, "INSERT") !== FALSE OR strpos( $query, "UPDATE") !== FALSE OR strpos( $query, "DELETE") !== FALSE ):
                    $log[] = $query;
                endif;
            endforeach;
        endif;
        
        //if some INSERT, UPDATE or DELETE queries were found, log them
        if( is_array($log) ):
            //change array to json string
            $log = json_encode( $log );
            
            $user_id = $CI->session->userdata('user_id');
            
            //save log to the user_activity_log table
            $CI->load->model('user_model');
            $CI->user_model->log_activity( $CI->session->userdata('user_id'), $log );
        endif;
    }