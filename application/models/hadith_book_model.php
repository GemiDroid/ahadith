<?php

class Hadith_book_model extends CI_Model{

	// @todo please escape all values
	public function __construct(){
		$this->load->database();
	}

	public function get_all_hadith_books(){
		$query = $this->db->query('select * from hadith_book');
		return $query;
	}

	public function insert_hadith_book($hadith_book_id, $hadith_book_title_ar, $hadith_book_title_en, $hadith_book_title_ur){
		$data = array(
			'hadith_book_id' => $hadith_book_id,
			'hadith_book_title_ar' => $hadith_book_title_ar,
			'hadith_book_title_en' => $hadith_book_title_en,
			'hadith_book_title_ur' => $hadith_book_title_ur
			);
		$this->db->insert('hadith_book', $data);

		if($this->db->_error_message()){
			return $this->db->_error_message();	
		}
		return false;
		
	}

	public function get_hadith_book_by_id($hadith_book_id){
		$query = $this->db->query('select * from hadith_book where hadith_book_id ='. $hadith_book_id . ' limit 1');
		return $query;	
	}

	public function delete_hadith_book_by_id($hadith_book_id){

		$query = $this->db->delete('hadith_book', array('hadith_book_id' => $hadith_book_id)); 	
		return $query;
		
		
		

		
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