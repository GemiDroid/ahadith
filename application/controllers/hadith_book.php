<?php

class Hadith_book extends CI_Controller{
	
	function _remap( $method, $param ) {
      
    if( $method == 'view' ):
      
      //set default for parameter hadith_book_id
	  if( !isset( $param[0] ) ):
		$param[0] = '';
	  endif;
	  //set default for parameter book_id
	   if( !isset( $param[1] ) ):
		$param[1] = '';
	  endif;
	  //set default for parameter chapter_id
	   if( !isset( $param[2] ) ):
		$param[2] = '';
	  endif;
	  //set default for parameter hadith_in_book_id
	   if( !isset( $param[3] ) ):
		$param[3] = '';
	  endif;
      
      $this->view( $param[0] ,$param[1] ,$param[2],$param[3]);
	     
    elseif( $method == 'add' ):
		 $this->add();
		 
	 elseif( $method == 'display' ):
		 $this->display();
    
    elseif( $method == 'store' ):
		 $this->store();
	
    elseif( $method == 'edit' ):
		//set default for parameter hadith_book_id
		if( !isset( $param[0] ) ):
			$param[0] = '';
		endif;
      
		$this->edit($param[0]);
		
	elseif( $method == 'update' ):
	if( !isset( $param[0] ) ):
			$param[0] = '';
		endif;
		$this->update($param[0]);
		
	elseif( $method == 'delete' ):
		//set default for parameter hadith_book_id
		if( !isset( $param[0] ) ):
			$param[0] = '';
		endif;
      
		$this->delete($param[0]);
       
    //for all other method names, display an error message
    else:
        $list['error_msg'] = "The Page you are trying to view does not exists. Use the menu if you have access.";
        $list['main_content'] = "message_view";
        $this->load->view('includes/template', $list);
    endif;
  }
	
	/*Method to view hadith book
	 *
	 *@param string $hadith_book_id Id of hadith_book
	 *@param string $book_id Id of book
	 *@param string $chapter_id Id of chapter
	 *@param string $hadith_in_book Id of hadith_in_book
	 *
	 *@return none
	 *
	 */

	public function view($hadith_book_id='',$book_id='',$chapter_id='',$hadith_in_book_id=''){

		//if session is empty, then user_id will be empty string, otherwise it would get '0' from session array
		$list['user_id'] = $user_id = empty($this->session->userdata('user_id'))?'':$this->session->userdata('user_id');
			
			
		//get ajax request for tags
		if( $this->input->is_ajax_request() ):
			$data = $this->input->post('data');
			
			
			if($data['email_subscription'] == true):
			
				$this->load->model('user_model');
				$user_data = array(
					'email_subscription' => '1',
					
								);
				$this->user_model->update_user_subscription( $user_id,$user_data);
				
			else:
				if($data['email_subscription'] == false):
					$this->load->model('user_model');
					$user_data = array(
						'email_subscription' => '0',
						
									);
					$this->user_model->delete_user_subscription( $user_id,$user_data);
				endif;
				
			endif;
			
			
			
			if( $data['task'] == 'hadith-tag' ):
			
				$this->load->model('tag_model');
				
				$message=false;
				
				//get selected hadith's tags
				$hadith_tags_arr = $this->tag_model->get_hadith_tag_by_hadith_id_and_user_id( $data['hadith_id'], $user_id );
				
				
				//for existing tags
				if( !empty($data['tags_id']) ):
				
					$tags_id = explode(',',$data['tags_id']);
					
					//delete tags whcih were added before, n now user didnt select them
					if( !empty( $hadith_tags_arr ) ):
						foreach( $hadith_tags_arr as $row ):
							if(  !in_array($row->tag_id,$tags_id) ):
								//delete tag
								$this->tag_model->delete_hadith_tag_by_id( $row->hadith_tag_id );
							endif;
						endforeach;
					endif;
					
					//adding existing tags to hadith_tag
					foreach( $tags_id as $tag_id ):
						//check if that tag already exist in database
						if( $this->tag_model->get_hadith_by_tag_and_hadith_id( $tag_id, $data['hadith_id'] ) === FALSE ):
					
							$hadith_tag = array(
									'hadith_id' => $data['hadith_id'],
									'tag_id' => $tag_id,
									'suggested_by'=>$user_id,
									'approved_by'=>null
									);
							
							$message =  $this->tag_model->add_hadith_tag( $hadith_tag );
						endif;
					endforeach;
				else:
					//if user didnt select any tag, delete tags which were added before
					$this->tag_model->delete_hadith_tag( $data['hadith_id']);					
				endif;
				
				
				//get new tags whcih are not avaialble in tag table
				if( !empty($data['new_tags']) ):
					
					$new_tags = explode(',',$data['new_tags']);
				
					foreach( $new_tags as $new_tag ):

						$tag_data = array(
							'tag_title_en' =>$new_tag,
							'suggested_by' => $user_id,
							'approved_by' => null
										);
						//add tag in tag table
						$message = $this->tag_model->add_tag( $tag_data );
							
						$tag_id = $this->tag_model->get_last_tag_id();
							
						//add that tag also in hadith tag
						$hadith_tag = array(
								'hadith_id' => $data['hadith_id'],
								'tag_id' => $tag_id,
								'suggested_by'=>$user_id,
								'approved_by'=>null
							);
					
						$message =  $this->tag_model->add_hadith_tag( $hadith_tag );
							
					endforeach;
				endif;
				
				//get updated list of hadith_tags
				$hadith_tags = $this->tag_model->get_hadith_tag_by_hadith_id_and_user_id( $data['hadith_id'], $user_id );
				
				$hadith_tags_html ='';
				$hadith_tags_options='';
				
				//get html code for drop down and label
				
				if(!empty( $hadith_tags )):
					foreach( $hadith_tags as $hadith_tag ):
						$hadith_tags_html .= '<span class="label label-default pull-right" style="margin-left: 5px;">'.$hadith_tag->tag_title_en.'</span>';
						$hadith_tags_options .= '<option value="'. $hadith_tag->tag_id.'">'.$hadith_tag->tag_title_en.'</option>';
					endforeach;
				endif;
				
				$data = new stdClass();
				$data->message = $message;
				$data->hadith_tags_html = $hadith_tags_html;
				$data->hadith_tags_options = $hadith_tags_options;
				
				echo json_encode( $data );
				
				return;
			elseif( $data['task'] == 'user-settings' ):
				
				//unset task, to make data settings array only
				unset( $data['task'] );
				
				//unset user_setting sessions
				$this->session->unset_userdata($data);
				
				//set user_setting sessions
				$this->session->set_userdata( $data );
				
				$this->load->model('user_model');
				
				foreach( $data as $key => $value ):
					
					//if user setting was not inserted
					if( empty($this->user_model->get_user_setting_by_id($key, $user_id)) ):
					
						$user_setting = array(
							'setting_title' => $key,
							'setting_value' => $value,
							'user_id' => $user_id
										);
						//add setting by user id
						$this->user_model->insert_user_setting( $user_setting );
					else:
						//update setting value
						$this->user_model->update_user_setting($key, $user_id,array('setting_value'=>$value));
						
					endif;
					
				endforeach;
				
				return;
			
			elseif( $data['task'] == 'hadith-bookmark' ):
				
				$this->load->model('user_model');
				
				if( $data['book_mark'] == 'add' ):
				
					$user_favorite = array(
						'hadith_in_book_id' => $data['hadith_in_book_id'],
						'hadith_book_id' => $data['hadith_book_id'],
						'user_id' => $user_id
										);
					
					$this->user_model->insert_user_favorite( $user_favorite );
				else:
					//delete book mark by id's.	
					$this->user_model->delete_user_favorite( $data['hadith_in_book_id'], $data['hadith_book_id'], $user_id );
					
				endif;

				return;
			elseif( $data['task'] == 'report-error' ):
				$this->load->model('hadith_model');
				
				$data['user_id'] = $user_id;
				$data['timestamp'] = date('Y-m-d H:i:s');
				
				unset($data['task']);
				
				$this->hadith_model->insert_error_report( $data );

				return;
			endif;
				
		endif;
		
		
	
		$this->load->model('hadith_book_model');

		if($hadith_book_id !='' AND $this->hadith_book_model->get_hadith_book_by_id( $hadith_book_id ) == FALSE ):
		
			$list['error_msg'] = "Provided Hadith Book ID doesn't exist. Use the menu if you have access.";
			$list['main_content'] = "message_view";
			$this->load->view('includes/template', $list);
			return;
		endif;

		$this->load->model('book_model');

		if( $book_id != '' ):
			//check book by its hadith book id
			if($this->book_model->get_book_by_id( $book_id, $hadith_book_id ) == FALSE ):
				$list['error_msg'] = "Provided Book ID doesn't exist.Use the menu if you have access.";
				$list['main_content'] = "message_view";
				$this->load->view('includes/template', $list);
				return;
			endif;
		endif;

		$this->load->model('chapter_model');

		//if( $chapter_id != '' ):
		//	//check chapter by its book and hadith book id
		//	if( $this->chapter_model->get_chapter_by_id( $chapter_id, $book_id, $hadith_book_id ) == FALSE ):
		//		$list['error_msg'] = "Provided Chapter ID doesn't exist in given Hadith Book.Use the menu if you have access.";
		//		$list['main_content'] = "message_view";
		//		$this->load->view('includes/template', $list);
		//		return;
		//	endif;
		//endif;
		
		//check hadith by its chapter, book and hadith book id
		if($hadith_in_book_id != '' AND $this->hadith_book_model->get_hadith_in_book_by_id( $hadith_in_book_id, $chapter_id, $book_id, $hadith_book_id ) == FALSE ):
			$list['error_msg'] = "Provided Hadith In Book ID doesn't exist in given Book and Chapter.Use the menu if you have access.";
			$list['main_content'] = "message_view";
			$this->load->view('includes/template', $list);
			return;
		endif;
		
		$list['ahadith_books'] = $this->hadith_book_model->get_books_by_hadith_book_id( $hadith_book_id );
		
		$book_id = !empty($book_id)? $book_id: $list['ahadith_books'][0]->book_id;
		
		$list['ahadith'] ='';

		if( !empty( $hadith_book_id ) ):
			$this->load->model('hadith_model');
			$this->load->model('user_model');
			$list['ahadith'] = $this->hadith_model->get_ahadith_by_hadith_book_id( $hadith_book_id, $book_id, $chapter_id, $hadith_in_book_id );
			
			
			
			if(!empty( $list['ahadith'] )):
			
				$this->load->model('tag_model');
				for( $i=0;$i<count($list['ahadith']);$i++ ):
					//get ahadith tag, if user is not signed in, then get approved tags of hadith,otherwise get by user and hadith ID.
					$list['ahadith'][$i]->hadith_tags = $this->tag_model->get_hadith_tag_by_hadith_id_and_user_id( $list['ahadith'][$i]->hadith_id, $user_id );
					$list['ahadith'][$i]->chapter_title_en = $this->chapter_model->get_chapter_by_id( $list['ahadith'][$i]->chapter_id )->chapter_title_en;
					$list['ahadith'][$i]->chapter_title_ar = $this->chapter_model->get_chapter_by_id( $list['ahadith'][$i]->chapter_id )->chapter_title_ar;
					$list['ahadith'][$i]->chapter_title_ur = $this->chapter_model->get_chapter_by_id( $list['ahadith'][$i]->chapter_id )->chapter_title_ur;
					$list['ahadith'][$i]->book_mark = $this->user_model->get_user_favorite( $list['ahadith'][$i]->hadith_in_book_id,$list['ahadith'][$i]->hadith_book_id, $user_id );
				endfor;
				
			endif;
				
		endif;
				
		$list['book'] = $this->book_model->get_book_by_id( $book_id );
		$list['chapters'] = $this->chapter_model->get_chapter_by_hadith_and_book_id( $hadith_book_id, $book_id );
		
		$list['hadith_book'] = $this->hadith_book_model->get_hadith_book_by_id( $hadith_book_id );
		
		$this->load->model('user_model');


		//if session is empty then check its value in db, otherwise it would be empty		
		$list['chapter_display'] = empty($this->session->userdata('chapter_display'))? (!empty($this->user_model->get_user_setting_by_id('chapter_display',$user_id))? $this->user_model->get_user_setting_by_id('chapter_display',$user_id)->setting_value:'') : $this->session->userdata('chapter_display');
		$list['chapter_language'] = empty($this->session->userdata('chapter_language'))? (!empty($this->user_model->get_user_setting_by_id('chapter_language',$user_id))? $this->user_model->get_user_setting_by_id('chapter_language',$user_id)->setting_value:'') : $this->session->userdata('chapter_language');
		$list['display_arabic_text'] = empty($this->session->userdata('display_arabic_text'))? (!empty($this->user_model->get_user_setting_by_id('display_arabic_text',$user_id))? $this->user_model->get_user_setting_by_id('display_arabic_text',$user_id)->setting_value:'') : $this->session->userdata('display_arabic_text');
		$list['display_english_text'] = empty($this->session->userdata('display_english_text'))? (!empty($this->user_model->get_user_setting_by_id('display_english_text',$user_id))? $this->user_model->get_user_setting_by_id('display_english_text',$user_id)->setting_value:'') : $this->session->userdata('display_english_text');
		$list['display_urdu_text'] = empty($this->session->userdata('display_urdu_text'))? (!empty($this->user_model->get_user_setting_by_id('display_urdu_text',$user_id))? $this->user_model->get_user_setting_by_id('display_urdu_text',$user_id)->setting_value:'') : $this->session->userdata('display_urdu_text');
		
		
		
		$list['email_subscription'] = $this->user_model->get_user_subscription_by_id('email_subscription',$user_id);
		//$list['email_subscription'] = empty($this->session->userdata('email_subscription'))? (!empty($this->user_model->get_user_subscription_by_id('email_subscription',$user_id))? $this->user_model->get_user_subscription_by_id('email_subscription',$user_id)->email_subscription:'') : $this->session->userdata('email_subscription');
		
		$this->load->model('tag_model');
		
		//get tags by user_id
		$list['tags'] = $this->tag_model->get_all_tags( $user_id );
		
		$this->load->helper('form');
		
		//pagination code	
		$this->load->library('pagination');
		$config['base_url'] =  base_url().$list['hadith_book']->hadith_book_id.'/book/'. $list['book']->book_id .'/chapter/';
		$config['total_rows'] = count( $list['chapters'] )+1;
		$config['per_page'] = 10;
		$this->pagination->initialize( $config );
		$list['pages'] = $this->pagination->create_links();
	
		$list['main_content'] ='hadith_book/index';
		
		$this->load->view('includes/template', $list);
	}

	/*Method to create hadith_book
	 *
	 *@return none
	 *
	 */
	
	public function add(){

		$this->load->helper('form');
		
		$this->load->library('form_validation');
    
		$this->form_validation->set_rules('hadith_book_id', 'Hadith ID', 'required');
		$this->form_validation->set_rules('hadith_book_title_ar', 'Arabic Title', 'required');
		$this->form_validation->set_rules('hadith_book_title_en', 'English Title', 'required');
		$this->form_validation->set_rules('hadith_book_title_ur', 'Urdu Title', 'required');
		
		$list['main_content'] = 'hadith_book/add_hadith_book_view';
		if ($this->form_validation->run() == FALSE):
		$this->load->view('admin/includes/template',$list);
		
		else:
		//if( !empty($this->input->post('mysubmit'))):
		
		$data['hadith_book_id'] = $this->input->post('hadith_book_id');
		$data['hadith_book_title_ar'] = $this->input->post('hadith_book_title_ar');
		$data['hadith_book_title_en'] = $this->input->post('hadith_book_title_en');
		$data['hadith_book_title_ur'] = $this->input->post('hadith_book_title_ur');

		$this->load->model('hadith_book_model');
		$this->hadith_book_model->insert_hadith_book($data);
		
		 redirect('admin/hadith-book');
			//echo "Successfully inserted Chapter";
		endif;

	}
	
	  public function display(){
		
		$this->load->helper('form');
		$this->load->model('hadith_book_model');
		$list['hadith_books'] = $this->hadith_book_model->get_hadith_books();
		$list['main_content'] = 'hadith_book/hadith_book_view';
		
		$this->load->view('admin/includes/template',$list);
	}

	/*Method to store hadith_book
	 *
	 *@return none
	 *
	 */
	
	public function store(){

		$hadith_book_id = $this->input->post('hadith_book_id');
		$hadith_book_title_ar = $this->input->post('hadith_book_title_ar');
		$hadith_book_title_en = $this->input->post('hadith_book_title_en');
		$hadith_book_title_ur = $this->input->post('hadith_book_title_ur');
		$this->load->model('hadith_book_model');

		$this->hadith_book_model->insert_hadith_book($hadith_book_id, $hadith_book_title_ar,$hadith_book_title_en, $hadith_book_title_ur);

		echo 'Successfully added';
	}
	
	/*Method to edit hadith_book
	 *
	 *@param string $id Id of hadith_book
	 *
	 *@return none
	 *
	 */

	public function edit($id){
		$this->load->model('hadith_book_model');
		$query = $this->hadith_book_model->get_hadith_book_by_id($id);
		$book = $query->row();

		$url = base_url("hadith_book/update");

		$list['book'] = $book;
		$list['url'] = $url;
		$list['main_content'] = 'hadith_book/edit'; 
		$this->load->view('includes/template', $list);
	}

	/*Method to update hadith_book
	 *
	 *@return none
	 *
	 */
	
	public function update($hadith_book_id){
		
   
	$this->load->helper('form');
    
	$this->load->library('form_validation');

	$this->form_validation->set_rules('hadith_book_title_ar', 'Arabic Title', 'required');
	$this->form_validation->set_rules('hadith_book_title_en', 'English Title', 'required');
	$this->form_validation->set_rules('hadith_book_title_ur', 'Urdu Title', 'required');
	
	
	$this->load->model('hadith_book_model');
	$list['hadith_book_id'] = $hadith_book_id;
       $list['hadith_books'] = $this->hadith_book_model->get_hadith_book_by_id($hadith_book_id);
       
	$list['main_content'] = 'hadith_book/update_hadith_book_view';
	if ($this->form_validation->run() == FALSE):
	$this->load->view('admin/includes/template',$list);
	
	else:
	//if( !empty($this->input->post('mysubmit'))):
		    
		    $data['hadith_book_title_ar'] = $this->input->post('hadith_book_title_ar');
		    $data['hadith_book_title_en'] = $this->input->post('hadith_book_title_en');
		    $data['hadith_book_title_ur'] = $this->input->post('hadith_book_title_ur');
    
	  $this->load->model('hadith_book_model');
	  $this->hadith_book_model->update_hadith_book($hadith_book_id,$data);
    
	  redirect('admin/hadith-book');
      //echo "Successfully updated Chapter";

    endif;
		
		
	}

	/* Method to delete hadith_book
	 *
	 * @param string $hadith_book_id Id of hadith_book
	 *
	 * @return none
	 */
	
	public function delete($hadith_book_id){
		
		 $this->load->helper('url');
		$this->load->model('hadith_book_model');
		$this->hadith_book_model->delete_hadith_book_by_id($hadith_book_id);
		
		redirect('admin/hadith-book');
	}
	
}
