<?php

class Hadith_model extends CI_Model{
  /*
    * Get a hadith book by id
    *
    * @param integer $hadith_book_id
    * @return mixed
  */
  function get_ahadith_by_hadith_book_id( $hadith_book_id='',$book_id='',$chapter_id='',$hadith_in_book_id='' ) {
      
      $sql_query = '';
    
     if( !empty( $book_id ) ):
      $sql_query = 'AND book_id = "'.$book_id.'" ';
     endif;
    
     if( !empty( $chapter_id ) ):
      $sql_query .= 'AND chapter_id = "'.$chapter_id.'" ';
     endif;
     
     if( !empty( $hadith_in_book_id ) ):
      $sql_query .= 'AND hadith_in_book_id = "'.$hadith_in_book_id.'" ';
     endif;
    
     $this->load->database('default');
     
     $this->db->where('hadith_id IN (SELECT hadith_id FROM hadith_in_book WHERE hadith_book_id = "'.$hadith_book_id.'" '.$sql_query.' )');

     $q = $this->db->get('hadith');
     
     $data = FALSE;
     
     foreach ($q->result() as $row):
        $data[] = $row;
     endforeach;
          
     $q->free_result();
     return $data;
  }
}