<?php

class Role_model extends CI_Model{


  function get_all_roles(  ){
    $this->load->database('default');
    $query = $this->db->get('role');
    $data = '';

    foreach ($query->result() as $row):

      $data[] = $row;
    endforeach;

    return $data;

  }
  
  function get_role_by_title( $role_title ){
    $this->load->database('default');
    $this->db->where('role_title',$role_title);
    $query = $this->db->get('role');
    $data = '';

    foreach ($query->result() as $row):

      $data[] = $row;
    endforeach;

    return $data;

  }
  

  function insert_role( $data ) {
    $this->load->database('default');
     
    $this->db->insert('role', $data);
    
    $message = FALSE;
     
    //check if errors were encountered while inserting
    if( $this->db->_error_message() ):  
      $message['type'] = "error";
      $message['body'] = $this->db->_error_message();
    else:
      $message['type'] = "success";
      $message['body'] = "Successfully added Role.";
    endif;
    
    return $message;
  }

  function delete_role($role_title){
      $this->load->database('default');
      $this->db->where('role_title',$role_title);
      $this->db->delete('role');
  }
  
  
   function update_role($role_title,$data){
      $this->load->database('default');
      $this->db->where('role_title',$role_title);
      $this->db->update('role',$data);
  }
}