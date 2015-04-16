<?php

class Hadith_book_model extends CI_Model{

	public function __construct(){
		$this->load->database('default');
	}
	
	/*
	* Get all hadith books optional parameter
	*
	* @param string $lang language option
	* @param string $text search text
	* @param string $words search text option
	* @param string $hadith_book_id hadith book ID
	* @param string $book_id Book ID
	* 
	*
	* @return mixed
	*/


	public function get_all_hadith_books($lang='',$type_search_text='',$search_text_option= '', $hadith_book_id='', $book_id='',$all_hadith_book='',$all_book=''){

		$this->load->database('default');
		 
		if(!empty($lang)):
			if( $lang == 'Arabic' ):
				
				$this->db->select('hadith_plain_ar AS hadith_body');
		
				if(!empty($type_search_text)):
					if(!empty($search_text_option)):
					//exact phrase
						if($search_text_option=='Exact Phrase'):
							$this->db->like('hadith_plain_ar',$type_search_text);
						endif;
					//all word
						if($search_text_option=='All Words'):
							
							//$this->db->like('hadith_plain_ar',$type_search_text);
	
							$searchterm = explode(' ',$type_search_text);

							$searchColumns = array("hadith_plain_ar");
							$searchCondition = '';
						      
							for($i = 0; $i < count($searchColumns); $i++)
							  {
							      $searchFieldName = $searchColumns[$i];
							      $searchCondition .= "($searchFieldName LIKE '%" . implode("%' AND $searchFieldName LIKE '%", $searchterm) . "%')";
							      if($i+1 < count($searchColumns)) $searchCondition .= " AND ";
							   }
							$sql = $this->db->where($searchCondition);
							
							
						endif;
						
					//any word
						if($search_text_option=='Any Word'):
							
							$searchterm = explode(' ',$type_search_text);

							$searchColumns = array("hadith_plain_ar");
							$searchCondition = '';
						      
							for($i = 0; $i < count($searchColumns); $i++)
							  {
							      $searchFieldName = $searchColumns[$i];
							      $searchCondition .= "($searchFieldName LIKE '%" . implode("%' OR $searchFieldName LIKE '%", $searchterm) . "%')";
							      if($i+1 < count($searchColumns)) $searchCondition .= " OR ";
							   }
							$sql = $this->db->where($searchCondition);
							
							
						endif;	
					endif;
				endif;
			endif;
		
			if( $lang == 'English' ):
				
				$this->db->select('hadith_plain_en AS hadith_body');
				
				if(!empty($type_search_text)):
				
					if(!empty($search_text_option)):
					//exact phrase
						if($search_text_option=='Exact Phrase'):
							$this->db->like('hadith_plain_en',$type_search_text);

						endif;
					//all word
						if($search_text_option=='All Words'):
			
							//$this->db->like('hadith_plain_en',$type_search_text);
							
							
							$searchterm = explode(' ',$type_search_text);

							$searchColumns = array("hadith_plain_en");
							$searchCondition = '';
						      
							for($i = 0; $i < count($searchColumns); $i++)
							  {
							      $searchFieldName = $searchColumns[$i];
							      $searchCondition .= "($searchFieldName LIKE '%" . implode("%' AND $searchFieldName LIKE '%", $searchterm) . "%')";
							      if($i+1 < count($searchColumns)) $searchCondition .= " AND ";
							   }
							$sql = $this->db->where($searchCondition);
							
							
						endif;
						
					//any word
						if($search_text_option=='Any Word'):
							//$keywords[] = explode(" ",$type_search_text);
							//
							//var_dump($keywords); //die();
							//for($i=0;$i<count($keywords);$i++):
							//
							//	$this->db->or_like('hadith_plain_en',$keywords[$i]);
							//
							//endfor;
							
							
							
							 $searchterm = explode(' ',$type_search_text);

							$searchColumns = array("hadith_plain_en");
							$searchCondition = '';
						      
							for($i = 0; $i < count($searchColumns); $i++)
							  {
							      $searchFieldName = $searchColumns[$i];
							      $searchCondition .= "($searchFieldName LIKE '%" . implode("%' OR $searchFieldName LIKE '%", $searchterm) . "%')";
							      if($i+1 < count($searchColumns)) $searchCondition .= " OR ";
							   }
							$sql = $this->db->where($searchCondition);
							//$sql = "SELECT * FROM view_in_hadith_book WHERE $searchCondition;";
							
							//echo $sql;
						endif;
						
					endif;
				endif;
			endif;
		
			if( $lang == 'Urdu' ):
				
				$this->db->select('hadith_plain_ur AS hadith_body');
			
				if(!empty($type_search_text)):
					if(!empty($search_text_option)):
					//exact phrase
						if($search_text_option=='Exact Phrase'):
							$this->db->like('hadith_plain_ur',$type_search_text);
						endif;
					//all word
						if($search_text_option=='All Words'):
							
							//$this->db->like('hadith_plain_ur',$type_search_text);
						
							$searchterm = explode(' ',$type_search_text);

							$searchColumns = array("hadith_plain_ur");
							$searchCondition = '';
						      
							for($i = 0; $i < count($searchColumns); $i++)
							  {
							      $searchFieldName = $searchColumns[$i];
							      $searchCondition .= "($searchFieldName LIKE '%" . implode("%' AND $searchFieldName LIKE '%", $searchterm) . "%')";
							      if($i+1 < count($searchColumns)) $searchCondition .= " AND ";
							   }
							$sql = $this->db->where($searchCondition);	
							
						endif;
						
					//any word
						if($search_text_option=='Any Word'):
							
							$searchterm = explode(' ',$type_search_text);

							$searchColumns = array("hadith_plain_ur");
							$searchCondition = '';
						      
							for($i = 0; $i < count($searchColumns); $i++)
							  {
							      $searchFieldName = $searchColumns[$i];
							      $searchCondition .= "($searchFieldName LIKE '%" . implode("%' OR $searchFieldName LIKE '%", $searchterm) . "%')";
							      if($i+1 < count($searchColumns)) $searchCondition .= " OR ";
							   }
							$sql = $this->db->where($searchCondition);
							
							
						endif;	
					endif; 
				endif;
			endif;	
		endif;
		
		//if all books(checkbox) for hadith books is not checked
		
		if(empty($all_hadith_book)):
			if( !empty($hadith_book_id) ):
				$this->db->where('hadith_book_id',$hadith_book_id);
			endif;
			if( !empty($book_id) ):
				$this->db->where('book_id',$book_id);
			endif;

		endif;	
			
		
		$this->db->select('hadith_id');
		$this->db->select('hadith_book_id');
		$this->db->select('book_id');
		
		$query = $this->db->get('view_hadith_in_book');
		$q = $this->db->last_query();
		echo $q;
		$data = '';
		
		foreach ($query->result() as $row):
			$data[] = $row;
		endforeach;
		
		return $data;
		
	}
	/*
		* Get all hadith books
		*
		* @return mixed
	*/
	//
	//function get_all_hadith_books(){
	//	
	//	$this->load->database('default');
	//	$query = $this->db->get('hadith_book');
	//	$data = '';
	//
	//	foreach ($query->result() as $row):
	//		$data[] = $row;
	//	endforeach;
	//
	//
	//	return $data;
	//}
	
	
	function get_book_by_id($book_id){
		
		$this->load->database('default');
		$this->db->where('book_id',$book_id);
		$query = $this->db->get('book');
		$data = '';
	    
		foreach ($query->result() as $row):
	    
		  $data[] = $row;
		endforeach;
	    
		return $data;

		
	}
	
	function get_all_books($hadith_book_id){
		$this->load->database('default');
		$this->db->where('hadith_book_id',$hadith_book_id);
		$query = $this->db->get('book');
		$data = '';
	    
		foreach ($query->result() as $row):
	    
		  $data[] = $row;
		endforeach;
	    
		return $data;

	}
		
	function get_hadith_books(){
		$this->load->database('default');
		$query = $this->db->get('hadith_book');
		$data = '';
	    
		foreach ($query->result() as $row):
	    
		  $data[] = $row;
		endforeach;
	    
		return $data;
	
	}
	
	function insert_hadith_book($data){

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

	function delete_hadith_book_by_id($hadith_book_id){

		$this->load->database('default');
		$this->db->where('hadith_book_id',$hadith_book_id);
		$this->db->delete('hadith_book');

	}

	function update_hadith_book($hadith_book_id, $hadith_book_title_ar, $hadith_book_title_en, $hadith_book_title_ur){

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
