<?php
	class Chapter_model extends CI_Model{

      /*
      * Get a specific chapter by id
      *
      * @param integer $chapter_id
      * @return array
      */
      function get_chapter_by_id( $chapter_id ) {
         $this->load->database('default');
         
         $this->db->where('chapter_id', $chapter_id);
         $q = $this->db->get('chapter');
         
         $data = FALSE;
         
         if($q->num_rows() > 0):
             $data = $q->row();
         endif;
         
         $q->free_result();
         return $data;
      }
}