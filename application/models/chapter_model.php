<?php

class Chapter_model extends CI_Model{


	function get_all_chapters(){
	  $this->load->database('default');
	  
	  $query = $this->db->get('chapter');
	  $data = FALSE;

	  if($query->num_rows()>0):
		foreach ($query->result() as $row):
		  $data[] = $row;
		endforeach;
	  endif;

	  return $data;

	}
	

    function get_chapter_by_id($chapter_id, $book_id='', $hadith_book_id=''){
      $this->load->database('default');
      $this->db->where('chapter_id',$chapter_id);
	  
	  if( !empty( $book_id ) ):
		$this->db->where('book_id',$book_id);
	  endif;
	  
	  if( !empty( $hadith_book_id ) ):
		$this->db->where('hadith_book_id',$hadith_book_id);
	  endif;

      $query = $this->db->get('chapter');

      $data ='';

      if($query->num_rows()>0):
      $data = $query->row();
      endif;
      return $data;

    }
	
	function get_chapter_by_hadith_and_book_id( $hadith_book_id,$book_id ){
      $this->load->database('default');
      
	  $this->db->where('hadith_book_id',$hadith_book_id);
	  $this->db->where('book_id',$book_id);

      $query = $this->db->get('chapter');

      $data ='';

      if($query->num_rows()>0):
		foreach ($query->result() as $row):
			$data[] = $row;
		endforeach;
      endif;
      
	  $query->free_result();
	  
      return $data;

    }

    function insert_chapter($chapter){
      $this->load->database('default');
      $this->db->insert('chapter',$chapter);
      echo $this->db->last_query();


    }

    function update_chapter($chapter_id,$data){
      $this->load->database('default');
      $this->db->where('chapter_id',$chapter_id);

      $this->db->update('chapter',$data);
      echo $this->db->last_query();
    }

    function delete_chapter($chapter_id){
      $this->load->database('default');
      $this->db->where('chapter_id',$chapter_id);
      $this->db->delete('chapter');

    }

}
