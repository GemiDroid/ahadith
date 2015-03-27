<?php

class Book extends CI_Controller{
  function _remap( $method, $param ) {
      
    if( $method == 'view' ):
      
      //set default for parameter book_id
	  if( !isset( $param[0] ) ):
		$param[0] = '';
	  endif;
      
      $this->view( $param[0] );
        
    //for all other method names, display an error message
    else:
        $list['error_msg'] = "The Page you are trying to view does not exists. Use the menu if you have access.";
        $list['main_content'] = "message_view";
        $this->load->view('includes/template', $list);
    endif;
  }

  /*Method to view book
   *
   *@param string $book_id ID of book
   *
   *@return none
   */
  
  function view( $book_id ='' ) {
    $this->load->model('book_model');
    
    $data = '';
	$mode = 'add';
    
    //display an error message if the provided book_id doesn't exists
    if( !empty($book_id)):
      if( $this->book_model->get_book_by_id( $book_id ) === FALSE ):
      
        echo "The Book ID provided doesn't exist. Use the menu if you have access.";
        return;
      endif;
      
      $data = $this->book_model->get_book_by_id( $book_id );
      $mode="edit";
      
    endif;
    
    $list['book_id'] = $book_id;
	$list['data'] = $data;
	$list['mode'] = $mode;
    
    $this->load->helper('form');
    
    $this->load->library('form_validation');
				
	//set validation rules
	$this->form_validation->set_rules('txt_book_id', 'Book ID', 'trim|required');
    $this->form_validation->set_rules('txt_book_number', 'Book Number', 'trim|required');
	$this->form_validation->set_rules('txt_book_title_ar', 'Book Title in Arabic', 'trim|required');
    $this->form_validation->set_rules('txt_book_title_en', 'Book Title in English', 'trim|required');
    $this->form_validation->set_rules('txt_book_title_ur', 'Book Title in Urdu', 'trim|required');
    $this->form_validation->set_rules('ddl_hadith_book_id', 'Hadith Book ID', 'trim|required');
    			
	$list['main_content'] = 'book_view';
				
	//get all the class lists records
	$list['books'] = $this->book_model->get_all_books();
    $list['hadith_books'] = $this->book_model->get_all_hadith_books();
    
    //until all validations are cleared
    if( $this->form_validation->run() == FALSE ):
        //$this->load->view('includes/template', $list);
		$list['main_content'] = 'book_view';
        $this->load->view('includes/template', $list);
        
    //when all validation are cleared, proceed to save
    else:
        //check if the Delete button was clicked
        $delete = $this->input->post('btn_delete');
        if( isset ($delete) && !empty($delete) ):
        
          $message = $this->book_model->delete_book( $book_id );
          //$this->session->set_flashdata('message', $message);
		  redirect('book/view/');
          
        //when the Save button was clicked
		else:
		  $data = array(
                  'book_id' => $this->input->post('txt_book_id'),
				  'book_number' => $this->input->post('txt_book_number'),
				  'book_title_ar' => $this->input->post('txt_book_title_ar'),
                  'book_title_en'=> $this->input->post('txt_book_title_en'),
                  'book_title_ur'=> $this->input->post('txt_book_title_ur'),
                  'hadith_book_id'=> $this->input->post('ddl_hadith_book_id'),
					  );
       
          //check if the mode is add
          if($mode == 'add'):
              
            $message = $this->book_model->add_book( $data );
              
          //for edit mode
          elseif($mode == 'edit'):
            $message = $this->book_model->update_book( $book_id, $data );
          endif;
          
          //$this->session->set_flashdata('message', $message);
		  redirect('book/view/');
          
        endif;
    endif;
				
  }
}