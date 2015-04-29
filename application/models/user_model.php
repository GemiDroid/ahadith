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

      function insert_user($user){
        $this->load->database('default');
        $this->db->insert('user',$user);
        //echo $this->db->last_query();

      }

      /*
       * Method to update user based on user_id
       *
       * @param integer $user_id
       * @param array $data
       * @return array
       */



      //function update_user( $user_id,$data ){
      //    $this->load->database('default');
      //
      //    $this->db->where('user_id', $user_id);
      //    $this->db->update('user', $data);
      //}
      
      
      function update_user($data){
        
        $this->db->where('user_id',$this->session->userdata('user_id'));
        //$this->db->where('password',($this->input->post('txt_old_password')));
        $query=$this->db->get('user');   

        if ($query->num_rows() > 0):
                $row = $query->row();
                if($row->user_id==$this->session->userdata('user_id')):
                    //$data = array(
                    //  'password' => ($this->input->post('txt_new_password'))
                    // );
                    $this->db->where('user_id',$this->session->userdata('user_id'));
                    //$this->db->where('password',($this->input->post('txt_old_password')));
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
      
      
      function update_password(){
       //  $this->db->select('user_id');
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
        //echo $this->db->last_query();
    }
    
    
    function get_all_hadith(){
       
        $this->load->database('default');  
        $q = $this->db->get('hadith');
          
        $data = FALSE;
          
        foreach ($q->result() as $row):
            $data[] = $row;
        endforeach;
          
        $q->free_result();
        return $data;
    
    }
    
    
     function insert_user_favorite($data){
        $this->load->database('default');
        //$data = array(
	//		'hadith_in_book_id' => $hadith_in_book_id,
	//		'hadith_book_id' => $hadith_book_id,
	//		'user_id' => $user_id
	//		);
        $this->db->insert('user_favorite',$data);
        //echo $this->db->last_query();

    }
  }
