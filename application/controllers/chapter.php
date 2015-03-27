<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chapter extends CI_COntroller {
  
  function _remap( $method, $param ) {
			
    if( $method == 'display' ):
      $this->display();
      
    elseif( $method == 'read' ):
      
      //set default for parameter chapter_id
	  if( !isset( $param[0] ) ):
		$param[0] = '';
	  endif;
      
      $this->read( $param[0] );
      
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
    $this->load->model('chapter_model');
    $list['ahadith'] = $this->chapter_model->get_all_chapters();
    $list['main_content'] = 'chapter_view';
    
    $this->load->view('includes/template',$list);
  }

  /*Method to read chapter
   *
   *@param string $chapter_id ID of chapter
   *
   *@return none
   */

  public function read($chapter_id){
      $this->load->model('chapter_model');
      $list['chapter'] =  $this->chapter_model->get_chapter_by_id($chapter_id);
      $list['main_content'] = 'read_chapter_view';
      
      $this->load->view('includes/template',$list);
  }

  /*Method to add chapter
   *
   *@return none
   */
  
  public function add(){
  
    $this->load->model('book_model');
    $list['books'] = $this->book_model->get_all_books();
    $list['hadith_books'] = $this->book_model->get_all_hadith_books();
    $list['main_content'] = 'add_chapter_view';
    
    $this->load->helper('form');
    $this->load->view('includes/template',$list);
    
    if( !empty($this->input->post('mysubmit'))):
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

      echo "Successfully inserted Chapter";
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

    $this->load->model('book_model');
    $this->load->model('chapter_model');
    $this->load->helper('form');
    
    $list['books'] = $this->book_model->get_all_books();
    $list['hadith_books'] = $this->book_model->get_all_hadith_books();
    $list['chapter_id'] = $chapter_id;
    $list['chapter'] =  $this->chapter_model->get_chapter_by_id($chapter_id);
    $list['main_content'] = 'update_chapter_view';
    
    $this->load->view('includes/template',$list);
    
    if( !empty($this->input->post('mysubmit'))):
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

      echo "Successfully updated Chapter";

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

    echo "Deleted Chapter";
  }

}
