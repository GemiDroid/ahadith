<?php

class Tag_model extends CI_Model{


  function get_all_tags(){
    $this->load->database('default');
    $query = $this->db->get('tag');
    $data = '';

    foreach ($query->result() as $row):

      $data[] = $row;
    endforeach;

    return $data;

  }
  
  
  /*
    * Get hadith tags by hadith id
    *
    * @param integer $hadith_id
    * @return mixed array
  */
  function get_hadith_tag_by_hadith_id_and_user_id( $hadith_id,$user_id ) {
    
    $this->load->database('default');
     
    $this->db->where('hadith_id', $hadith_id);
    $this->db->where('suggested_by', $user_id);
    
    $q = $this->db->get('view_hadith_tag');
     
    $data = FALSE;
			
    foreach ($q->result() as $row):
      $data[] = $row;
    endforeach;
			
    $q->free_result();
    
    return $data;
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
        
}