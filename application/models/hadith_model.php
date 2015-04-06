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

    function get_hadith_by_id($hadith_id){
      $this->load->database('default');
      $this->db->where('hadith_id',$hadith_id);

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

    function update_hadith($hadith_id,$data){
      $this->load->database('default');
      $this->db->where('hadith_id',$hadith_id);
      $this->db->update('hadith',$data);

    }

    function delete_hadith($hadith_id){
      $this->load->database('default');
      $this->db->where('hadith_id',$hadith_id);
      $this->db->delete('hadith');

    }

  /*
    * Get a hadith book by id
    *
    * @param integer $hadith_book_id
    * @return mixed
  */
  function get_ahadith_by_hadith_book_id( $hadith_book_id='',$book_id='',$chapter_id='',$hadith_in_book_id='' ) {

     // $sql_query = '';
     //
     //if( !empty( $book_id ) ):
     // $sql_query = 'AND book_id = "'.$book_id.'" ';
     //endif;
     //
     //if( !empty( $chapter_id ) ):
     // $sql_query .= 'AND chapter_id = "'.$chapter_id.'" ';
     //endif;
     //
     //if( !empty( $hadith_in_book_id ) ):
     // $sql_query .= 'AND hadith_in_book_id = "'.$hadith_in_book_id.'" ';
     //endif;
     //
     //$this->load->database('default');
     //
     //$this->db->where('hadith_id IN (SELECT hadith_id FROM hadith_in_book WHERE hadith_book_id = "'.$hadith_book_id.'" '.$sql_query.' )');
     //
     //$q = $this->db->get('hadith');
     //$q = $this->db->get('view_hadith_in_book');

     //echo $this->db->last_query();

     $this->load->database('default');

     if( !empty( $book_id ) ):
      $this->db->where('book_id',$book_id);
     endif;

     if( !empty( $chapter_id ) ):
      $this->db->where('chapter_id',$chapter_id);
     endif;

     if( !empty( $hadith_in_book_id ) ):
      $this->db->where('hadith_in_book_id',$hadith_in_book_id );
     endif;

     $q = $this->db->get('view_hadith_in_book');

     $data = FALSE;

     foreach ($q->result() as $row):
        $data[] = $row;
     endforeach;

     $q->free_result();
     return $data;
  }
}
