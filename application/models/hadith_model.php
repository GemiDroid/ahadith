<?php

class Hadith_model extends CI_Model{

    /*
        * Get a all ahadith
        * @return mixed
    */
        

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
      //echo $this->db->last_query();

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
    * @param string $hadith_book_id optional
    * @param string $book_id optional
    * @param int $chapter_id optional
    * @param int $hadith_in_book_id optional
    * @return mixed
  */
  function get_ahadith_by_hadith_book_id( $hadith_book_id='',$book_id='',$chapter_id='',$hadith_in_book_id='' ) {

    $this->load->database('default');

    if( $hadith_book_id !='' ):
        $this->db->where('hadith_book_id',$hadith_book_id);
    endif;
     
    if( $book_id !='' ):
        $this->db->where('book_id',$book_id);
    endif;

    //get 10 onwards chapters
    if( $chapter_id != '' ):
        $this->db->where('chapter_id >= ',$chapter_id);
        $this->db->where('chapter_id < ',$chapter_id+9);
    endif;

    if( $hadith_in_book_id != '' ):
        $this->db->where('hadith_in_book_id',$hadith_in_book_id );
    endif;

    $q = $this->db->get('view_hadith_in_book');

    //echo $this->db->last_query();
     
    $data = FALSE;

    foreach ($q->result() as $row):
        $data[] = $row;
    endforeach;

    $q->free_result();
    return $data;
  }
  
   function get_all_authenticity(){
        $this->load->database('default');
        $query = $this->db->get('authenticity');
        $data = '';
    
        foreach ($query->result() as $row):
    
          $data[] = $row;
        endforeach;
    
        return $data;

    }

  
}
