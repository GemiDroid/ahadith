<?php

class Tag_model extends CI_Model{


  function get_all_tags( $user_id='' ){
    $this->load->database('default');
    
    if( $user_id != '' ):
      $this->db->where('suggested_by',$user_id);
    endif;
    
    $query = $this->db->get('tag');
    $data = '';

    if($query->num_rows() > 0):
      foreach ($query->result() as $row):
        $data[] = $row;
      endforeach;
    endif;
    
    return $data;

  }
  
  
  /*
    * Get hadith tags by hadith id
    *
    * @param integer $hadith_id
    * @return mixed array
  */
  function get_hadith_tag_by_hadith_id_and_user_id( $hadith_id,$user_id='' ) {
    
    $this->load->database('default');
     
    $this->db->where('hadith_id', $hadith_id);
    
    if( !empty($user_id) ):
      $this->db->where('suggested_by', $user_id);
    else:
      //get approved tags, if user is not signed in
      $this->db->where('approved_by !=','NULL'); 
    endif;
    
    $q = $this->db->get('view_hadith_tag');
     
    $data = FALSE;
	
    if($q->num_rows() > 0):		
      foreach ($q->result() as $row):
        $data[] = $row;
      endforeach;
    endif;
			
    $q->free_result();
    
    return $data;
  }
  
  function get_hadith_by_tag_and_hadith_id( $tag_id, $hadith_id ){
    $this->load->database('default');
     
    $this->db->where('hadith_id', $hadith_id);
    $this->db->where('tag_id', $tag_id);
    
    $q = $this->db->get('view_hadith_tag');
     
    $data = FALSE;
			
    if($q->num_rows() > 0):
      $data = $q->row();
    endif;
			
    $q->free_result();
    
    return $data;
  }
	
    
  /*
    * Method to add hadith_tag
    *
    * @param array $data
    * @return boolean
    */
  function add_tag( $data ) {
    $this->load->database('default');
     
    $this->db->insert('tag', $data);
    
    $message = FALSE;
     
    //check if errors were encountered while inserting
    if( $this->db->_error_message() ):  
      $message['type'] = "error";
      $message['body'] = $this->db->_error_message();
    else:
      $message['type'] = "success";
      $message['body'] = "Successfully added Hadith Tag.";
    endif;
    
    return $message;
  }	
  
  /*
    * Method to add hadith_tag
    *
    * @param array $data
    * @return boolean
    */
  function add_hadith_tag( $data ) {
    $this->load->database('default');
     
    $this->db->insert('hadith_tag', $data);
    
    $message = FALSE;
     
    //check if errors were encountered while inserting
    if( $this->db->_error_message() ):  
      $message['type'] = "error";
      $message['body'] = $this->db->_error_message();
    else:
      $message['type'] = "success";
      $message['body'] = "Successfully added Hadith Tag.";
    endif;
    
    return $message;
  }
  
  /*
  * Delete hadith tag
  *
  * @param string $hadith id
  * @return mixed
  */
  function delete_hadith_tag( $hadith_id) {
     $this->load->database('default');
     
     $this->db->where('hadith_id', $hadith_id);
     $this->db->delete('hadith_tag');
     
     $message = FALSE;
     
     //check if errors were encountered while deleting
     if( $this->db->_error_message() ):
         $message['type'] = 'error';
         $message['body'] = 'Some error occured while deleting record - ' . $this->db->_error_message();
         
     else:
         $message['type'] = 'success';
         $message['body'] = 'Successfully deleted Hadith Tags.';
         
     endif;
     
     return $message;
  }
  
   /*
  * Delete hadith tag by hadith_tag_id
  *
  * @param string $hadith tag id
  * @return mixed
  */
  function delete_hadith_tag_by_id( $hadith_tag_id) {
     $this->load->database('default');
     
     $this->db->where('hadith_tag_id', $hadith_tag_id);
     $this->db->delete('hadith_tag');
     
     $message = FALSE;
     
     //check if errors were encountered while deleting
     if( $this->db->_error_message() ):
         $message['type'] = 'error';
         $message['body'] = 'Some error occured while deleting record - ' . $this->db->_error_message();
         
     else:
         $message['type'] = 'success';
         $message['body'] = 'Successfully deleted Hadith Tags.';
         
     endif;
     
     return $message;
  }
  
  function get_last_tag_id(){
     $this->load->database('default');
            
      $this->db->select_max('tag_id', 'max_tag_id');
      $q = $this->db->get('tag');
  
      $data = FALSE;
      
      //default id will be 1
      $temp = 1;
      
      if($q->num_rows() > 0):
          $temp = $q->row();
          $temp = $temp->max_tag_id;
      endif;
      
      return $temp;
      
  }
}