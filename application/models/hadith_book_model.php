<?php

class Hadith_book_model extends CI_Model{


	public function __construct(){
		$this->load->database('default');
	}


	public function get_all_hadith_books(){
		$query = $this->db->query('select * from hadith_book');
		return $query;
	}

	public function insert_hadith_book($data){

		$this->load->database('default');

		$this->db->insert('hadith_book', $data);

		if($this->db->_error_message()){
			return $this->db->_error_message();
		}
		return false;

	}

	/*
      * Get a hadith book by id
      *
      * @param integer $hadith_book_id
      * @return mixed
    */
      function get_hadith_book_by_id( $hadith_book_id ) {
         $this->load->database('default');

         $this->db->where('hadith_book_id', $hadith_book_id);
         $q = $this->db->get('hadith_book');

         $data = FALSE;

         if($q->num_rows() > 0):
             $data = $q->row();
         endif;

         $q->free_result();
         return $data;
      }


	  /*
      * Get a hadith in book by id
      *
      * @param integer $hadith_in_book_id
      * @return mixed
    */

	  function get_hadith_in_book_by_id( $hadith_in_book_id ) {
         $this->load->database('default');

         $this->db->where('hadith_in_book_id', $hadith_in_book_id);
         $q = $this->db->get('hadith_in_book');

         $data = FALSE;

         if($q->num_rows() > 0):
             $data = $q->row();
         endif;

         $q->free_result();
         return $data;
      }

	public function delete_hadith_book_by_id($hadith_book_id){

		$this->load->database('default');
		$this->db->where('hadith_book_id',$hadith_book_id);
		$this->db->delete('hadith_book');

	}

	public function update_hadith_book($hadith_book_id, $hadith_book_title_ar, $hadith_book_title_en, $hadith_book_title_ur){

		$data = array(
			'hadith_book_title_ar' => $hadith_book_title_ar,
			'hadith_book_title_en' => $hadith_book_title_en,
			'hadith_book_title_ur' => $hadith_book_title_ur
			);

		$this->db->where('hadith_book_id', $hadith_book_id);
		$this->db->update('hadith_book', $data);
		return $query;
	}
}
