<?php
    class User_model extends CI_Model {
  
    /*
    * Check if the user can login. Criteria 1: User record must exist. 2: User must be active
    *
    * @param string $user_id
    * @return boolean
    */
    function validate_user($user_id, $password='') {
       $this->load->database('default');
       
       $this->db->where('user_id', $user_id);
       if(!empty( $password )):
        $this->db->where('password', $password);
      endif;
       $this->db->where('is_active', '1'); //1 is for active users i.e., not disabled
       $q = $this->db->get('user');
       
       if($q->num_rows() == 1):
           $q->free_result();
           return TRUE;
       endif;
       
       $q->free_result();
       return FALSE;
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
       * Method to update user based on user_id
       *
       * @param integer $user_id
       * @param array $data
       * @return array
       */
      
      function update_user( $user_id,$data ){
          $this->load->database('default');
          
          $this->db->where('user_id', $user_id);
          $this->db->update('user', $data);
      }
  }