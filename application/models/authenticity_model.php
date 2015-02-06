<?php

class Authenticity_model extends CI_Model{

  function get_authenticity(){
    $this->load->database('default');
    $query = $this->db->get('authenticity');
    $data = '';

    foreach ($query->result() as $row):

      $data[] = $row;
    endforeach;

    return $data;

    }

    function get_authenticity_by_id($authenticity_id){
      $this->load->database('default');
      $this->db->where('authenticity_id',$authenticity_id);

      $query = $this->db->get('authenticity');

      $data ='';
      $data = $query->row();
      return $data;

    }


    function insert_authenticity($authenticity){
      $this->load->database('default');
      $this->db->insert('authenticity',$authenticity);

    }



    function update_authenticity($authenticity_id,$data){
      $this->load->database('default');
      $this->db->where('authenticity_id',$authenticity_id);
      $this->db->update('authenticity',$data);

    }

    function delete_authenticity($authenticity_id){
      $this->load->database('default');
      $this->db->where('authenticity_id',$authenticity_id);
      $this->db->delete('authenticity');

    }
  }
