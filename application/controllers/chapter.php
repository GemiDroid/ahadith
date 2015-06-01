<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chapter extends CI_COntroller {
  
  function _remap( $method, $param ) {
			
    if( $method == 'display' ):
      $this->display();
      
    elseif( $method == 'add' ):
      $this->add();
      
    elseif( $method == 'update' ):
    
      //set default for parameter chapter_id
	  if( !isset( $param[0] ) ):
		$param[0] = '';
	  endif;
      
      $this->update( $param[0] );
    elseif( $method == 'delete' ):
      
      //set default for parameter chapter_id
	  if( !isset( $param[0] ) ):
		$param[0] = '';
	  endif;
      
      $this->delete( $param[0] );
        
    //for all other method names, display an error message
    else:
        $list['error_msg'] = "The Page you are trying to view does not exists. Use the menu if you have access.";
        $list['main_content'] = "message_view";
        $this->load->view('includes/template', $list);
    endif;
  }

  /*Method to display chapter
   *
   *return none
   *
   */
  
  public function display(){
    
    $this->load->helper('form');
    $this->load->model('chapter_model');
    $list['ahadith'] = $this->chapter_model->get_all_chapters();
    $list['main_content'] = 'admin/chapter_view';
    
    $this->load->view('admin/includes/template',$list);
  }

  /*Method to add chapter
   *
   *@return none
   */
  
  public function add(){
  
    $this->load->model('book_model');
    $list['books'] = $this->book_model->get_all_books();
    $list['hadith_books'] = $this->book_model->get_all_hadith_books();
    $list['main_content'] = 'admin/add_chapter_view';
    
    $this->load->helper('form');
    
    $this->load->library('form_validation');
    $this->form_validation->set_rules('txt_title_ar', 'Arabic Title', 'trim|required');
    $this->form_validation->set_rules('txt_title_en', 'English Title', 'trim|required');
    $this->form_validation->set_rules('txt_title_ur', 'Urdu Title', 'trim|required');
    $this->form_validation->set_rules('txt_detail_ar', 'Arabic Detail', 'trim|required');
    $this->form_validation->set_rules('txt_detail_en', 'English Detail', 'trim|required');
    $this->form_validation->set_rules('txt_detail_ur', 'Urdu Detail', 'trim|required');
    $this->form_validation->set_rules('ddl_book_id', 'Book ID', 'trim|required');
    $this->form_validation->set_rules('ddl_hadith_book_id', 'Hadith Book ID', 'trim|required');
    
    if ($this->form_validation->run() == FALSE):
    $this->load->view('admin/includes/template',$list);
    
    else:
    
      $data['chapter_title_ar'] = $this->input->post('txt_title_ar');
      $data['chapter_title_en'] = $this->input->post('txt_title_en');
      $data['chapter_title_ur'] = $this->input->post('txt_title_ur');
      $data['chapter_detail_ar'] = $this->input->post('txt_detail_ar');
      $data['chapter_detail_en'] = $this->input->post('txt_detail_en');
      $data['chapter_detail_ur'] = $this->input->post('txt_detail_ur');
      $data['book_id'] = $this->input->post('ddl_book_id');
      $data['hadith_book_id'] = $this->input->post('ddl_hadith_book_id');

      $this->load->model('chapter_model');
      $this->chapter_model->insert_chapter($data);
  
      redirect('admin/chapter');
      
    endif;
  }

  /*Method to update chapter
   *
   *@param string $chapter_id ID of chapter
   *
   *@return none
   *
   */
  
  public function update($chapter_id){

    $this->load->model('chapter_model');
    
    if( $this->chapter_model->get_chapter_by_id($chapter_id) == FALSE ):
      $list['error_msg'] = "No record found for the provided Chapter ID. Use the menu if you have access.";
      $list['main_content'] = "message_view";
      $this->load->view('admin/includes/template', $list);
      return;
    endif;
      
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->form_validation->set_rules('txt_title_ar', 'Arabic Title', 'trim|required');
    $this->form_validation->set_rules('txt_title_en', 'English Title', 'trim|required');
    $this->form_validation->set_rules('txt_title_ur', 'Urdu Title', 'trim|required');
    $this->form_validation->set_rules('txt_detail_ar', 'Arabic Detail', 'trim|required');
    $this->form_validation->set_rules('txt_detail_en', 'English Detail', 'trim|required');
    $this->form_validation->set_rules('txt_detail_ur', 'Urdu Detail', 'trim|required');
    $this->form_validation->set_rules('ddl_book_id', 'Book ID', 'trim|required');
    $this->form_validation->set_rules('ddl_hadith_book_id', 'Hadith Book ID', 'trim|required');
    
  
    $this->load->model('book_model');
    $list['books'] = $this->book_model->get_all_books();
    $list['hadith_books'] = $this->book_model->get_all_hadith_books();
    $list['chapter_id'] = $chapter_id;
    $list['chapter'] =  $this->chapter_model->get_chapter_by_id($chapter_id);
    $list['main_content'] = 'admin/update_chapter_view';
    
    
    if ($this->form_validation->run() == FALSE):
      $this->load->view('admin/includes/template',$list);
    
    else:
    
      $data['chapter_title_ar'] = $this->input->post('txt_title_ar');
      $data['chapter_title_en'] = $this->input->post('txt_title_en');
      $data['chapter_title_ur'] = $this->input->post('txt_title_ur');
      $data['chapter_detail_ar'] = $this->input->post('txt_detail_ar');
      $data['chapter_detail_en'] = $this->input->post('txt_detail_en');
      $data['chapter_detail_ur'] = $this->input->post('txt_detail_ur');
      $data['book_id'] = $this->input->post('ddl_book_id');
      $data['hadith_book_id'] = $this->input->post('ddl_hadith_book_id');

      $this->load->model('chapter_model');
      $this->chapter_model->update_chapter($chapter_id,$data);

      redirect('admin/chapter');
    endif;
  }

  /*Method to delete chapter
   *
   *@param string $chapter_id ID of chapter
   *
   *@return none
   */
  
  public function delete( $chapter_id){

    $this->load->helper('url');
    $this->load->model('chapter_model');
    $this->chapter_model->delete_chapter( $chapter_id );
  
    redirect('admin/chapter');
  }
  
  

}
