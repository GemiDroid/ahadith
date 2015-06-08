<?php
	class Book_model extends CI_Model{

      /*
       * Get all books
       *
       * @return mixed
       */
      function get_all_books( $hadith_book_id='' ) {
          $this->load->database('default');
          
		  if( !empty( $hadith_book_id ) ):
			$this->db->where('hadith_book_id',$hadith_book_id);
		  endif;
		  
          $q = $this->db->get('book');
          
          $data = FALSE;
          
          foreach ($q->result() as $row):
              $data[] = $row;
          endforeach;
          
          $q->free_result();
          return $data;
      }
      
      function get_all_hadith_books(){
          $this->load->database('default');
          
          $q = $this->db->get('hadith_book');
          
          $data = FALSE;
          
          foreach ($q->result() as $row):
              $data[] = $row;
          endforeach;
          
          $q->free_result();
          return $data;
      }
      
      /*
      * Get a specific book by id
      *
      * @param integer $book_id
      * @return array
      */
      function get_book_by_id( $book_id, $hadith_book_id='' ) {
         $this->load->database('default');
         
         $this->db->where('book_id', $book_id);
		 
		 if( !empty( $hadith_book_id ) ):
			$this->db->where('hadith_book_id', $hadith_book_id );
		 endif;
		 
         $q = $this->db->get('book');
         
         $data = FALSE;
         
         if($q->num_rows() > 0):
             $data = $q->row();
         endif;
         
         $q->free_result();
         return $data;
      }
      
      /*
      * Method to add book
      *
      * @param array $data
      * @return array
      */
      function add_book( $data ) {
         $this->load->database('default');
         
         $this->db->insert('book', $data);
         
         $message = FALSE;
         
         //check if errors were encountered while inserting
         if( $this->db->_error_message() ):
             $message['type'] = 'error';
             $message['body'] = 'Some error occured while saving book - ' . $this->db->_error_message();
             
         else:
             $message['type'] = 'success';
             $message['body'] = 'Book record for ' . $data['book_number'] . ' saved';
             
         endif;
         
         return $message;
      }
        
        
      /*
       * Method to update book based on book_id
       *
       * @param integer $book_id
       * @param array $data
       * @return array
       */
      function update_book( $book_id, $data ) {
          $this->load->database('default');
          
          $this->db->where('book_id', $book_id);
          $this->db->update('book', $data);
          
          $message = FALSE;
          
          //check if errors were encountered while updating
          if( $this->db->_error_message() ):
              $message['type'] = 'error';
              $message['body'] = 'Some error occured while updating book - ' . $this->db->_error_message();
              
          else:
              $message['type'] = 'success';
              $message['body'] = 'Successfully updated book record for Book ID: ' . $book_id;
              
          endif;
          
          return $message;
      }
        
        
      /*
       * Method to delete book based on book_id
       *
       * @param integer $book_id
       * @return array
       */
      function delete_book( $book_id ) {
          $this->load->database('default');
          
          $this->db->where('book_id', $book_id);
          $this->db->delete('book');
          
          $message = FALSE;
          
          //check if errors were encountered while deleting
          if( $this->db->_error_message() ):
              $message['type'] = 'error';
              $message['body'] = 'Some error occured while deleting book - ' . $this->db->_error_message();
              
          else:
              $message['type'] = 'success';
              $message['body'] = 'Successfully deleted book record';
              
          endif;
          
          return $message;
      }
      
    }