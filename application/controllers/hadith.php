<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hadith extends CI_Controller {

  function _remap( $method, $param ) {
			
    if( $method == 'display' ):
      $this->display();
      
    elseif( $method == 'add' ):
      $this->add();
      
    elseif( $method == 'update' ):
    
      //set default for parameter hadith_code
	  if( !isset( $param[0] ) ):
		$param[0] = '';
	  endif;
      
      $this->update( $param[0] );
    elseif( $method == 'delete' ):
      
      //set default for parameter hadith_code
	  if( !isset( $param[0] ) ):
		$param[0] = '';
	  endif;
      
      $this->delete( $param[0] );
      
    elseif( $method == 'hadith_in_book' ):
		//set default for parameter user_id
		if( !isset( $param[0] ) ):
			$param[0] = '';
		endif;
  
		if( !isset( $param[1] ) ):
			$param[1] = '';
		endif;
       $this->hadith_in_book( $param[0],$param[1] );
    //for all other method names, display an error message
    else:
        $list['error_msg'] = "The Page you are trying to view does not exists. Use the menu if you have access.";
        $list['main_content'] = "message_view";
        $this->load->view('includes/template', $list);
    endif;
  }

  /*Method to display all ahadith
   *
   *@return none
   *
   */
  
  public function display(){
    $this->load->helper('form');
    $this->load->model('hadith_model');
    
    $list['ahadith'] = $this->hadith_model->get_all_hadith();
    $list['main_content'] = 'admin/hadith_view';
    
    $this->load->view('admin/includes/template',$list);

  }
  
  /*Method to add hadith
   *
   *@return none
   *
  */

  public function add(){
    $this->load->helper('form');
    $this->load->model('hadith_model');
    
    $this->load->library('form_validation');
    $this->form_validation->set_rules('txt_plain_ar', 'Plain Arabic', 'trim|required');
    $this->form_validation->set_rules('txt_plain_en', 'Plain English', 'trim|required');
    $this->form_validation->set_rules('txt_plain_ur', 'Plain Urdu', 'trim|required');
    
    $this->form_validation->set_rules('txt_marked_ar', 'Marked Arabic', 'trim|required');
    $this->form_validation->set_rules('txt_marked_en', 'Marked English', 'trim|required');
    $this->form_validation->set_rules('txt_marked_ur', 'Marked Urdu', 'trim|required');
    $this->form_validation->set_rules('txt_raw_ar', 'Raw Arabic', 'trim|required');
    $this->form_validation->set_rules('ddl_authenticity_id', 'Authenticity ID', 'trim|required');
    
    
    $list['authenticity'] = $this->hadith_model->get_all_authenticity();
    $list['main_content'] = 'admin/add_hadith_view';
    
    if ($this->form_validation->run() == FALSE):
       $this->load->view('admin/includes/template',$list);
    
    else: 
    
      $data['hadith_plain_ar'] = $this->input->post('txt_plain_ar');
      $data['hadith_plain_en'] = $this->input->post('txt_plain_en');
      $data['hadith_plain_ur'] = $this->input->post('txt_plain_ur');
      $data['hadith_marked_ar'] = $this->input->post('txt_marked_ar');
      $data['hadith_marked_en'] = $this->input->post('txt_marked_en');
      $data['hadith_marked_ur'] = $this->input->post('txt_marked_ur');
      $data['hadith_raw_ar'] = $this->input->post('txt_raw_ar');
      $data['authenticity_id'] = $this->input->post('ddl_authenticity_id');
      
      $hadith_id = $this->hadith_model->insert_hadith($data);
      //redirect('admin/hadith');
      redirect('admin/hadith-in-book/'.$hadith_id);
    endif;

  }

  /*Method to update hadith
   *
   *@param string $hadith_code Id of hadith
   *
   *@return none
   */
  public function update($hadith_id){

    $this->load->model('hadith_model');
    //check for valid hadith_id
    if( $this->hadith_model->get_hadith_by_id($hadith_id) == FALSE ):
      $list['error_msg'] = "No record found for the provided Hadith ID. Use the menu if you have access.";
      $list['main_content'] = "message_view";
      $this->load->view('admin/includes/template', $list);
      return;
    endif;
    
    $this->load->helper('form');
    
    $this->load->library('form_validation');
    $this->form_validation->set_rules('txt_plain_ar', 'Plain Arabic', 'trim|required');
    $this->form_validation->set_rules('txt_plain_en', 'Plain English', 'trim|required');
    $this->form_validation->set_rules('txt_plain_ur', 'Plain Urdu', 'trim|required');
    $this->form_validation->set_rules('txt_marked_ar', 'Marked Arabic', 'trim|required');
    $this->form_validation->set_rules('txt_marked_en', 'Marked English', 'trim|required');
    $this->form_validation->set_rules('txt_marked_ur', 'Marked Urdu', 'trim|required');
    $this->form_validation->set_rules('txt_raw_ar', 'Raw Arabic', 'trim|required');
    $this->form_validation->set_rules('ddl_authenticity_id', 'Authenticity ID', 'required');
  
    $list['hadith_id'] = $hadith_id;
    $list['hadith'] =  $this->hadith_model->get_hadith_by_id($hadith_id);
    $list['authenticity'] = $this->hadith_model->get_all_authenticity();
    $list['main_content']= 'admin/update_hadith_view';
    if ($this->form_validation->run() == FALSE):
      $this->load->view('admin/includes/template',$list);

    else:
    
      $hadith['hadith_plain_ar'] = $this->input->post('txt_plain_ar');
      $hadith['hadith_plain_en'] = $this->input->post('txt_plain_en');
      $hadith['hadith_plain_ur'] = $this->input->post('txt_plain_ur');
      $hadith['hadith_marked_ar'] = $this->input->post('txt_marked_ar');
      $hadith['hadith_marked_en'] = $this->input->post('txt_marked_en');
      $hadith['hadith_marked_ur'] = $this->input->post('txt_marked_ur');
      $hadith['hadith_raw_ar'] = $this->input->post('txt_raw_ar');
      $hadith['authenticity_id'] = $this->input->post('ddl_authenticity_id');

      $this->load->model('hadith_model');
      $this->hadith_model->update_hadith($hadith_id,$hadith);

      //redirect('admin/hadith');
      redirect('admin/hadith-in-book/'.$hadith_id);
    endif;
  }

  /*Method to delete hadith
   *
   *@param string $hadith_code Id of hadith
   *
   *@return none
   *
   */
  public function delete( $hadith_id ){

    $this->load->model('hadith_model');
    //check for valid hadith_id
    if( $this->hadith_model->get_hadith_by_id($hadith_id) == FALSE ):
      $list['error_msg'] = "No record found for the provided Hadith ID. Use the menu if you have access.";
      $list['main_content'] = "message_view";
      $this->load->view('admin/includes/template', $list);
      return;
    endif;
  
    $this->hadith_model->delete_hadith( $hadith_id );
    redirect('admin/hadith');
  }
  
  function hadith_in_book( $hadith_id='', $hadith_in_book_id='' ){
		$this->load->model('hadith_book_model');
		$this->load->model('hadith_model');
		$this->load->model('book_model');
		$this->load->model('chapter_model');
		
		if( $this->input->is_ajax_request() ):
			$data = $this->input->post('data');
			//if chapter dropdown is changed
			if( $data['task'] == 'hadith-book' ):
				
				//get respected books for hadith book id
				$books = $this->book_model->get_all_books( $data['hadith_book_id'] );
				//get respected chapters for selected values
				$chapters = $this->chapter_model->get_all_chapters($data['hadith_book_id'], $books[0]->book_id );
				
				//html for options
				$book_html='';
				foreach( $books as $book ):
					$book_html .= '<option value="'.$book->book_id.'">'.$book->book_title_en.'</option>';
				endforeach;
				
				$chapter_html='';
				
				if(!empty( $chapters )):
				
					foreach( $chapters as $chapter ):
						$chapter_html .= '<option value="'.$chapter->chapter_id.'">'.substr($chapter->chapter_title_en,0,20).'&hellip;</option>';
					endforeach;
				endif;
				
				$data = new stdClass();
				$data->book_list = $book_html;
				$data->chapter_list = $chapter_html;
			
			elseif( $data['task'] == 'book' ):
			
				//get chapters by selected values
				$chapters = $this->chapter_model->get_all_chapters($data['hadith_book_id'], $data['book_id'] );
				
				$chapter_html='';
				
				//html for options
				if(!empty( $chapters )):
				
					foreach( $chapters as $chapter ):
						$chapter_html .= '<option value="'.$chapter->chapter_id.'">'.substr($chapter->chapter_title_en,0,20).'&hellip;</option>';
					endforeach;
				endif;

				
				$data = new stdClass();
				$data->chapter_list = $chapter_html;
			endif;
			
			echo json_encode( $data );
			
			return;
		endif;
		
		if( $this->hadith_model->get_hadith_by_id($hadith_id) == FALSE ):
			$list['error_msg'] = "No record found for the provided Hadith ID. Use the menu if you have access.";
			$list['main_content'] = "message_view";
			$this->load->view('admin/includes/template', $list);
			return;
		endif;
		
		if( $hadith_in_book_id !='' AND $this->hadith_book_model->get_hadith_in_book_by_id($hadith_in_book_id) == FALSE ):
			$list['error_msg'] = "No record found for the provided Hadith Book ID. Use the menu if you have access.";
			$list['main_content'] = "message_view";
			$this->load->view('admin/includes/template', $list);
			return;
		endif;
		
		$this->load->helper('form');
	    $this->load->library('form_validation');
	       
		//set validation rules
		$this->form_validation->set_rules('ddl_chapter_id', 'Chapter ID', 'required');
		$this->form_validation->set_rules('ddl_book_id', 'Book ID', 'required');
		$this->form_validation->set_rules('ddl_hadith_book_id', 'Hadith Book ID','required');
	       
		$list['hadith_id'] = $hadith_id;
		$list['hadith_in_books'] = $this->hadith_book_model->get_hadith_in_books( $hadith_id );
		$list['hadith_books'] = $this->hadith_book_model->get_hadith_books();
		$list['main_content'] = 'admin/hadith_in_book_view';
	       
		$data = '';
		$mode = 'add';
		
		//change mode to edit and load the data if a row_id is provided
		if( $hadith_in_book_id != '' ):
			$data = $this->hadith_book_model->get_hadith_in_book_by_id( $hadith_in_book_id );
			$mode = 'edit';
			
			$list['books'] = $this->book_model->get_all_books( $data->hadith_book_id );
			$list['chapters'] = $this->chapter_model->get_all_chapters( $data->hadith_book_id,$data->book_id );
		else:
			$list['books'] = $this->book_model->get_all_books( $list['hadith_books'][0]->hadith_book_id );
			$list['chapters'] = $this->chapter_model->get_all_chapters( $list['hadith_books'][0]->hadith_book_id,$list['books'][0]->book_id );	
		endif;
	    
	    
		$list['hadith_in_book_id'] = $hadith_in_book_id;
	    $list['data'] = $data;
	    $list['mode'] = $mode;
	       
	
		
		//until all validations are cleared
		if( $this->form_validation->run() == FALSE ):
			$this->load->view('admin/includes/template', $list);
		  
		//when all validation are cleared, proceed to save
		else:
        
			//check if the Delete button was clicked
			$delete = $this->input->post('btn_delete');
      		if( isset( $delete ) && !empty( $delete ) ):
				$message = $this->hadith_book_model->delete_hadith_in_book( $hadith_in_book_id );
			//when the Save button was clicked
			else:
		     
		    $data = array(
				'hadith_id' => $hadith_id,
				'chapter_id' => $this->input->post('ddl_chapter_id'),
				'book_id' => $this->input->post('ddl_book_id'),
				'hadith_book_id' => $this->input->post('ddl_hadith_book_id')
			);
		     
		    //$message = '';
		     
		    if($mode == 'add'):
				$message = $this->hadith_book_model->add_hadith_in_book( $data );
			
		    elseif($mode == 'edit'):
				$message = $this->hadith_book_model->update_hadith_in_book( $hadith_in_book_id, $data );
			
		    endif;
		     
		    // $this->session->set_flashdata('message', $message);
		     
		  endif;
		  
		redirect( 'admin/hadith-in-book/' . $hadith_id );
		  
	    endif; //endif for when all validations are clear, proceed to save
	}
	

}
