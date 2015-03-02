<?php

class Hadith_model extends CI_Model{

  function get_all_hadith(){
    $this->load->database('default');
    $query = $this->db->get('hadith');
    $data = '';

    foreach ($query->result() as $row):

      $data[] = $row;
    endforeach;

    return $data;

    }

    function get_hadith_by_code($hadith_code){
      $this->load->database('default');
      $this->db->where('hadith_code',$hadith_code);

      $query = $this->db->get('hadith');

      $data ='';
      $data = $query->row();
      return $data;

    }

    function insert_hadith($hadith){
      $this->load->database('default');
      $this->db->insert('hadith',$hadith);
      echo $this->db->last_query();

    }

    function update_hadith($hadith_code,$data){
      $this->load->database('default');
      $this->db->where('hadith_code',$hadith_code);
      $this->db->update('hadith',$data);

    }

    function delete_hadith($hadith_code){
      $this->load->database('default');
      $this->db->where('hadith_code',$hadith_code);
      $this->db->delete('hadith');

    }

}
