<?php

    class User_model extends CI_Model {

    /*
    * Check if the user can login. Criteria 1: User record must exist. 2: User must be active
    *
    * @param string $user_id
    * @return boolean
    */
    function validate_user($user_id, $password) {
        
       $this->load->database('default');

       $this->db->where('user_id', $user_id);
       $this->db->where('password', $password);

       $this->db->where('is_active', '1'); //1 is for active users i.e., not disabled
       $q = $this->db->get('user');

       if($q->num_rows() == 1):
           $q->free_result();
           return TRUE;
       endif;

       $q->free_result();
       
       return FALSE;
    }

    function validate_user_by_email($email){
      $this->load->database('default');
      $this->db->where('email_address',$email);
      $email = $this->db->get('user');
      if($email->num_rows == 1):
        $email->free_result();
        return TRUE;
      else:
        $email->free_result();
        return FALSE;
      endif;
    }
    
    /*
      * Get a user by email
      *
      * @param string $user_email
      * @return array
      */
    function get_user_by_email( $user_email ) {
         $this->load->database('default');

         $this->db->where('email_address', $user_email);
         $q = $this->db->get('user');

         $data = FALSE;

         if($q->num_rows() > 0):
             $data = $q->row();
         endif;

         $q->free_result();
         return $data;
      }
      
      /*
      * Get a user by id
      *
      * @param string $user_id
      * @return array
      */
    function get_user_by_id( $user_id ) {
         $this->load->database('default');

         $this->db->where('user_id', $user_id);
         $q = $this->db->get('user');

         $data = FALSE;

         if($q->num_rows() > 0):
             $data = $q->row();
         endif;

         $q->free_result();
         return $data;
      }
      
      /*
      * Get a user setting by setting_title and users_id
      *
      *@param string $setting_title
      *@param string $user_id
      * 
      * @return array
      */
    function get_user_setting_by_id( $setting_title, $user_id ) {
         $this->load->database('default');

         $this->db->where('setting_title', $setting_title);
         $this->db->where('user_id', $user_id);
         $q = $this->db->get('user_setting');
            
         $data = FALSE;

         if($q->num_rows() > 0):
             $data = $q->row();
         endif;

         $q->free_result();
         return $data;
    }
      
        
    /*
      * Method to add user
      *
      * @param array $data
      * @return array
    */
      
    function insert_user($user){
        $this->load->database('default');
        $this->db->insert('user',$user);

    }

      /*
       * Method to update user based on user_id
       *
       * @param array $data
       * @return array
       */
  
    function update_user( $data){
        $this->load->database('default');
        
        $this->db->where('user_id',$this->session->userdata('user_id'));
        
        $this->db->update('user', $data);
    }
      
      
    function update_password(){
    
        $this->db->where('user_id',$this->session->userdata('user_id'));
        $this->db->where('password',($this->input->post('txt_old_password')));
        $query=$this->db->get('user');   

        if ($query->num_rows() > 0):
                $row = $query->row();
                if($row->user_id==$this->session->userdata('user_id')):
                    $data = array(
                      'password' => ($this->input->post('txt_new_password'))
                     );
                    $this->db->where('user_id',$this->session->userdata('user_id'));
                    $this->db->where('password',($this->input->post('txt_old_password')));
                    if($this->db->update('user', $data)) :
                        return "Password Changed Successfully";
                    else:
                        return "Something Went Wrong, Password Not Changed";
                    endif;
                else:
                    return "Something Went Wrong, Password Not Changed";
                endif;


         else:
            return "Wrong Old Password";
         endif;
         
    }
      
      
    function get_hadith_in_book($hadith_id){
        $this->load->database('default');
        $this->db->where('hadith_id',$hadith_id);
  
        $query = $this->db->get('hadith_in_book');
  
        $data ='';
  
        if($query->num_rows()>0):
        $data = $query->row();
        endif;
        return $data;
    }
    

    /*
      * Get a user favorite by id
      *
      * @param string $user_favorite_id
      * @return array
      */
    
    function get_user_favorite_by_id( $user_favorite_id ){
        
        $this->load->database('default');
        $this->db->where('user_favorite_id',$user_favorite_id);
  
        $query = $this->db->get('user_favorite');
  
        $data ='';
  
        if($query->num_rows()>0):
            $data = $query->row();
        endif;
        return $data;
    }
    
    
      function forgot_password( $email ){
        
        $this->load->database('default');
        $this->db->where('email_address',$email);
  
        $query = $this->db->get('user');
  
        $data ='';
  
        if($query->num_rows()>0):
            $data = $query->row();
        endif;
        return $data;
    }
    
    /*
      * Get a user favorite by hadith_in_book_id, hadith_book_id and user_id
      *
      * @param string $hadith_in_book_id
      * @param string $hadith_book_id
      * @param string $user_id
      * * 
      * @return array
      */
    
    function get_user_favorite( $hadith_in_book_id, $hadith_book_id, $user_id ){
        
        $this->load->database('default');
        $this->db->where('hadith_in_book_id',$hadith_in_book_id);
        $this->db->where('user_id',$user_id);
        
  
        $query = $this->db->get('user_favorite');
  
        $data ='';
  
        if($query->num_rows()>0):
            $data = $query->row();
        endif;
        
        return $data;
    }
    
    /*
    * Log the queries that were executed by the user
    *
    * @param string $user_id
    * @param string $query json string of the array
    * @return none
    */
    function log_activity( $user_id, $query ) {
       
       $this->load->database('default');
       
       $data = array(
           'user_id' => $user_id,
           'log_time' => date( 'Y-m-d H:i:s' , time() ),
           'log_query' => $query
       );
       
       $this->db->insert('user_activity_log', $data);
    }
    
    /*
      * Method to add user favorite
      *
      * @param array $data
    */
    
    function insert_user_favorite($data){
        $this->load->database('default');
        $this->db->insert('user_favorite',$data);
    }
    
     /*
      * Method to add user setting
      *
      * @param array $data
    */
    
    function insert_user_setting($data){
        $this->load->database('default');
        $this->db->insert('user_setting',$data);
    }
    
     /*
       * Method to update user_setting based on setting title and user_id
       *
       * @param string $setting_title
       * @param string $user_id
       * @param array $data
    */
    
    function update_user_setting($setting_title, $user_id,$data){
        $this->load->database('default');
        
        $this->db->where('setting_title',$setting_title);
        $this->db->where('user_id',$user_id);
        
        $this->db->update('user_setting',$data);
    }
    
    
    
    /*
       * Method to delete user favorite based on hadith_in_book_id,hadith_book_id or user_id
       *
       * @param string $hadith_in_book_id
       * @param string $hadith_book_id
       * @param string $user_id
       * 
       */
    function delete_user_favorite( $hadith_in_book_id, $hadith_book_id, $user_id ) {
        $this->load->database('default');
          
        $this->db->where('hadith_in_book_id', $hadith_in_book_id);
        $this->db->where('hadith_book_id', $hadith_book_id);
        $this->db->where('user_id', $user_id);
        
        $this->db->delete('user_favorite');
    }
    
    function get_all_users(){
        $this->load->database('default');  
        $q = $this->db->get('user');
          
        $data = FALSE;
          
        foreach ($q->result() as $row):
            $data[] = $row;
        endforeach;
          
        $q->free_result();
        return $data;
    }

    function block_user($data,$user_id){
        $this->load->database('default');
        $this->db->where('user_id',$user_id);
       $this->db->update('user',$data);
        
    }
    
    
    function get_user_role($user_id){
        $this->load->database('default');
        $this->db->where('user_id',$user_id);
    
       $this->db->where('role_title','administrator' ); 
       $q = $this->db->get('user_role');

       if($q->num_rows() == 1):
           $q->free_result();
           return TRUE;
       endif;

       $q->free_result();
       
       return FALSE;

    }
    
    
    function get_report_by_id($error_id){
        $this->load->database('default');
        $this->db->where('error_id',$error_id);
 
       $q = $this->db->get('error_report');
        $data = FALSE;
          
        foreach ($q->result() as $row):
            $data[] = $row;
        endforeach;
          
        $q->free_result();
        return $data;
       

    }
    
     function get_all_role(){
        $this->load->database('default');
        $q = $this->db->get('role');
          
        $data = FALSE;
          
        foreach ($q->result() as $row):
            $data[] = $row;
        endforeach;
          
        $q->free_result();
        return $data;
    }
    
    function get_all_user_role(){
        $this->load->database('default');
        $q = $this->db->get('user_role');
          
        $data = FALSE;
          
        foreach ($q->result() as $row):
            $data[] = $row;
        endforeach;
          
        $q->free_result();
        return $data;
    }
    
    
    function insert_role($data1){
        $this->load->database('default');
        
        $this->db->insert('user_role',$data1);
        
    }
    
    function get_all_reports(){
        $this->load->database('default');
        $q = $this->db->get('error_report');
          
        $data = FALSE;
          
        foreach ($q->result() as $row):
            $data[] = $row;
        endforeach;
          
        $q->free_result();
        return $data;
    }
    
    function update_error_report($error_id,$data){
        $this->load->database('default');
        $this->db->where('error_id',$error_id);
        
        $this->db->update('error_report',$data);
    }
    
    function delete_error_report($error_id){
        $this->load->database('default');
        $this->db->where('error_id',$error_id);
        
        $this->db->delete('error_report');
    }
    
    
    
     function update_user_role($user_id,$data){
        $this->load->database('default');
        $this->db->where('user_id',$user_id);
        
        $this->db->update('user_role',$data);
    }
    
    function delete_user_role($user_id){
        $this->load->database('default');
        $this->db->where('user_id',$user_id);
        
        $this->db->delete('user_role');
    }
    
    function insert_user_role($data){
        $this->load->database('default');
        $this->db->insert('user_role',$data);
    }
    
    
    function get_user_role_by_id($user_id){
        $this->load->database('default');
        $this->db->where('user_id',$user_id);
    
   
        $q = $this->db->get('user_role');
        $data = FALSE;
          
        foreach ($q->result() as $row):
            $data[] = $row;
        endforeach;
          
        $q->free_result();
        return $data; 

    }
    
    
    function get_user_role_by_userid($role_title,$user_id){
         $this->load->database('default');
        $this->db->where('user_id',$user_id);
    
       $this->db->where('role_title',$role_title ); 
       $q = $this->db->get('user_role');

       if($q->num_rows() == 1):
           $q->free_result();
           return TRUE;
       endif;

       $q->free_result();
       
       return FALSE;
        
    }
    
    function get_user_activities(){
        $this->load->database('default');
   
       $q = $this->db->get('user_activity_log');
        $data = FALSE;
          
        foreach ($q->result() as $row):
            $data[] = $row;
        endforeach;
          
        $q->free_result();
        return $data;
     
    }
    
    
    function get_block_users(){
          $this->load->database('default');
        $this->db->where('is_active','0');
       $q = $this->db->get('user');
        $data = FALSE;
          
        foreach ($q->result() as $row):
            $data[] = $row;
        endforeach;
          
        $q->free_result();
        return $data;
    }
    
  }
