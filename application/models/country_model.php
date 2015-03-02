<?php

class Country_model extends CI_Model{


  function get_all_countries(){
    $this->load->database('default');
    $query = $this->db->get('country_list');
    $data = '';

    foreach ($query->result() as $row):

      $data[] = $row;
    endforeach;

    return $data;

    }
}
