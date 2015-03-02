<?php

class user_model extends CI_Model{

  function insert_user($user){
    $this->load->database('default');
    $this->db->insert('user',$user);
    //echo $this->db->last_query();

  }

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
}
