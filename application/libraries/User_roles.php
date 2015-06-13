<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');
    class User_roles {
        
        /*
         * Method to check whether the user is authorized against the provided roles
         *
         * @param array $roles
         * @return bool
         */
        public function is_authorized( $roles ) {
            
            $CI =& get_instance();
            
            //roles are not loaded in the session
            if( !is_array( $CI->session->userdata('roles') ) ):
                return FALSE;
            endif;
            
            //if only 1 role was passed in the error
            if( count($roles) == 1 ):
                if( !in_array( $roles[0], $CI->session->userdata('roles') ) ):
                    return FALSE;
                endif;
                return TRUE;
                
            else:
                //loop through all the roles passed and if even 1 is assigned, return TRUE
                foreach( $roles as $role ):
                    if( in_array( $role, $CI->session->userdata('roles') ) ):
                        return TRUE;
                    endif;
                endforeach;
                return FALSE;
                
            endif;
        }
        
        
        /*
         * Method to reload and update the list of roles for the user_id
         *
         * @param void
         * @return void
         */
        public function reload() {
            
            $CI =& get_instance();
            $CI->load->model('user_model');
            
            //get the current logged in user's id
            $user_id = $CI->session->userdata('user_id');
            
            //load his/her assigned roles from database
            $roles =  $CI->user_model->get_user_assigned_roles( $user_id, 'role_title' );
            
            //update the user session with the fetched roles
            $CI->session->set_userdata('roles', $roles);
            
            //also log this as the user's last activity
            $CI->user_model->log_last_activity( $user_id );
        }
    }