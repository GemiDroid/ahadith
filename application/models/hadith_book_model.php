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


	public function get_all_hadith_books($lang='en',$type_search_text='',$search_text_option= '', $hadith_book_id='', $book_id='',$all_hadith_book='',$all_book='',$display_per_page=''){
		
		//lang value will be 'ar','ur' or 'en'
		$hadith_plain = 'hadith_plain_'.$lang;
		
		//rename column name for all languages
		$this->db->select( $hadith_plain. ' AS hadith_body');
		$this->db->select('hadith_id');
		$this->db->select('hadith_book_id');
		$this->db->select('book_id');		
	
		if($search_text_option == 'Any Word'):
							
			$searchterm = explode(' ',$type_search_text);

			$searchColumns = array( $hadith_plain );
			$searchCondition = '';
			  
			for($i = 0; $i < count($searchColumns); $i++):
				  $searchFieldName = $searchColumns[$i];
				  $searchCondition .= "($searchFieldName LIKE '%" . implode("%' OR $searchFieldName LIKE '%", $searchterm) . "%')";
				  if($i+1 < count($searchColumns)) $searchCondition .= " OR ";
			endfor;
			$sql = $this->db->where($searchCondition);
			
		elseif($search_text_option == 'All Words'):
						
			$searchterm = explode(' ',$type_search_text);

			$searchColumns = array( $hadith_plain );
			$searchCondition = '';
			  
			for($i = 0; $i < count($searchColumns); $i++):
				  $searchFieldName = $searchColumns[$i];
				  $searchCondition .= "($searchFieldName LIKE '%" . implode("%' AND $searchFieldName LIKE '%", $searchterm) . "%')";
				  if($i+1 < count($searchColumns)) $searchCondition .= " AND ";
			endfor;
			$sql = $this->db->where($searchCondition);
			
		elseif( !empty( $type_search_text ) ):
		//case insenstive search
			$this->db->like('LOWER('.$hadith_plain.')',strtolower($type_search_text) );
		endif;	
	
		//all hadith book option is not selected
		if( empty( $all_hadith_book ) ):
			//hadith_book_id is not empty
			if(!empty( $hadith_book_id )):
				$this->db->where( 'hadith_book_id',$hadith_book_id );
			endif;
		endif;

		//all hadith book option and all book is not selected
		//if(  empty($all_hadith_book ) AND empty( $all_book ) ):
		if(  empty( $all_book ) ):
			//if all_hadith_book is selected also
			if( empty($all_hadith_book) ):
			//if(!empty( $book_id )):
				$this->db->where( 'book_id',$book_id );
			endif;
		endif;
		
		if( !empty( $display_per_page ) ):
			$this->db->limit( $display_per_page );
		endif;
		
		$q = $this->db->get('view_hadith_in_book');

		
		//echo $this->db->last_query();
		
		$data = '';
		
		if($q->num_rows() > 0):
			foreach ($q->result() as $row):
				$data[] = $row;
			endforeach;
		endif;
		
		$q->free_result();
		
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
		
		$q = $this->db->get('hadith_book');
		
		$data = FALSE;
          
        foreach ($q->result() as $row):
            $data[] = $row;
        endforeach;
          
        $q->free_result();
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
		$data = '';
	
		foreach ($q->result() as $row):
			$data[] = $row;
		endforeach;
	
		return $data;
	}
      
      
	public function get_books_by_hadith_book_id( $hadith_book_id ){
		
		$this->load->database('default');
		$this->db->where('hadith_book_id',$hadith_book_id);
		
		$query = $this->db->get('book');
		$data = '';
	
		foreach ($query->result() as $row):
			$data[] = $row;
		endforeach;
	
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
