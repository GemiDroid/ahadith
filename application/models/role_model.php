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
  
  /*
    * Get role by role_title
    *
    * @param string $role_title
    * @return mixed
  */
  function get_role_by_title( $role_title ) {
     $this->load->database('default');
     
     $this->db->where('role_title', $role_title);
     $q = $this->db->get('role');
     
     $data = FALSE;
     
     if( $q->num_rows() > 0 ):
         $data = $q->row();
     endif;
     
     $q->free_result();
     return $data;
  }
  
  /*
  * Returns roles excluding the role passed itself
  *
  * @param string $role_title
  * @return mixed
  */
  function get_potential_roles($role_title) {
     $this->load->database('default');
     
     $this->db->where('role_title NOT IN (SELECT role_title FROM role_dependency where dependent_role = "' . $role_title . '")');
     $this->db->where('role_title != ', $role_title);
     $this->db->order_by('role_order');
     $q = $this->db->get('role');
     
     $data = FALSE;
     
     if($q->num_rows() > 0):
         foreach( $q->result() as $row ):
             $data[] = $row;
         endforeach;
     endif;
     
     $q->free_result();
     return $data;
  }

  /*
   * Get all the role dependencies by role_title
   *
   * @return mixed
  */
  function get_role_dependencies_by_title( $role_title, $column = '' ) {
     $this->load->database('default');
     
     $this->db->where('role_title', $role_title);
     $q = $this->db->get('role_dependency');
     
     $data = FALSE;
     
     if($q->num_rows() > 0):
         foreach ( $q->result() as $row ):
             if( $column != '' ):
                 $data[] = $row->$column;
             else:
                 $data[] = $row;
             endif;
         endforeach;
     endif;
     
     $q->free_result();
     return $data;
  }
  
  /*
   * Get all the role dependencies by dependent_role
   *
   * @return mixed
  */
  function get_role_dependencies_by_dependent( $dependent_role, $column = '' ) {
       $this->load->database('default');
       
       $this->db->where('dependent_role', $dependent_role);
       $q = $this->db->get('role_dependency');
       
       $data = FALSE;
       
       if($q->num_rows() > 0):
           foreach ( $q->result() as $row ):
               if( $column != '' ):
                   $data[] = $row->$column;
               else:
                   $data[] = $row;
               endif;
           endforeach;
       endif;
       
       $q->free_result();
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

  /*
    * Add dependency for role
    *
    * @param array $data
    * @return mixed
  */
  function add_role_dependency( $data ) {
      $this->load->database('default');
      $this->db->insert('role_dependency', $data);
  }
  
  /*
    * Delete role dependencies
    *
    * @return none
    */
   function delete_role_dependency( $role_dependency ) {
       $this->load->database('default');
       
       $this->db->where($role_dependency);
       $this->db->delete('role_dependency');
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
  
  /*
    * Generate role order number
    *
    * @return mixed
    */
   function generate_role_order() {
       $this->load->database('default');
       
       $this->db->select_max('role_order', 'max_role_order');
       $q = $this->db->get('role');
       
       $data = FALSE;
       
       if($q->num_rows() > 0):
           $temp = $q->row();
           $temp = $temp->max_role_order;
       endif;
       
       $temp++;
       return $temp;
   }
}