<?php

class Search_model extends CI_Model{

    function get_all_hadith_books(){
        $this->load->database('default');
        $query = $this->db->get('hadith_book');
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
    
    function get_hadith_book_id($hadith_book_id){
        $this->load->database('default');
        $this->db->where('hadith_book_id',$hadith_book_id);
        $query = $this->db->get('hadith_in_book');
         $data = '';

        foreach ($query->result() as $row):
    
          $data[] = $row;
        endforeach;
    
        return $data;
        
    }
    
    
    function search_word($type_search_text='',$search_language='',$hadith_id=''){
        $this->load->database('default');
       
         //var_dump($result);
        
        
        if($search_language=='English'):
            $this->db->like('hadith_plain_en',$type_search_text);
            $this->db->like('hadith_id',$hadith_id);
        
        elseif($search_language=='Arabic'):
            $this->db->like('hadith_plain_ar',$type_search_text);
            $this->db->like('hadith_id',$hadith_id);
        else:
            $this->db->like('hadith_plain_ur',$type_search_text);
            $this->db->like('hadith_id',$hadith_id);
        endif;
        
         $query = $this->db->get('hadith');
        
        //echo $this->db->last_query();die();
        $data = '';

        foreach ($query->result() as $row):
    
          $data[] = $row;
        endforeach;
    
        return $data;
    }
}