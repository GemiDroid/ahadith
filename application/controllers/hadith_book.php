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
	     
    elseif( $method == 'create' ):
		 $this->create();
    
    elseif( $method == 'store' ):
		 $this->store();
	
    elseif( $method == 'edit' ):
		//set default for parameter hadith_book_id
		if( !isset( $param[0] ) ):
			$param[0] = '';
		endif;
      
		$this->edit($param[0]);
		
	elseif( $method == 'update' ):
		$this->update();
		
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

		//if the user is already not signed-in then redirect him/her to the signin()
		$list['user_id'] = $user_id = $this->session->userdata('user_id');
			
		//if( !isset($user_id) OR empty($user_id) ):
		//	redirect('user/signin');
		//endif;
		
		if( $this->input->is_ajax_request() ):
			$data = $this->input->post('data');
			
			if( $data['task'] == 'hadith-tag' ):
			
				$user_id = $this->session->userdata('user_id');
			
				$this->load->model('tag_model');
				
				$message=false;
				
				//delete all hadith tags before
				$message = $this->tag_model->delete_hadith_tag( $data['hadith_id'] );
				
				if( !empty($data['tags_id']) ):
				
					$tags_id = explode(',',$data['tags_id']);
					
					foreach( $tags_id as $tag_id ):
					
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
				
				$hadith_tags_html = "<ul>";
				
				if(!empty( $hadith_tags )):
					foreach( $hadith_tags as $hadith_tag ):
						$hadith_tags_html .=  "<li>".$hadith_tag->tag_title_en."</li>";	
					endforeach;
					
				endif;
				
				$hadith_tags_html .= "</ul>";
				
				$data = new stdClass();
				$data->message = $message;
				$data->hadith_tags_html=$hadith_tags_html;
				
				echo json_encode( $data );
				
				return;
				
			endif;
				
		endif;
				
	
		$this->load->model('hadith_book_model');

		if(!empty( $hadith_book_id ) AND $this->hadith_book_model->get_hadith_book_by_id( $hadith_book_id ) === FALSE ):
		
			$list['error_msg'] = "Provided Hadith Book ID doesn't exist. Use the menu if you have access.";
			$list['main_content'] = "message_view";
			$this->load->view('includes/template', $list);
			return;
		endif;

		$this->load->model('book_model');

		if(!empty( $book_id ) ):
			if($this->book_model->get_book_by_id( $book_id ) === FALSE ):
				$list['error_msg'] = "Provided Book ID doesn't exist.Use the menu if you have access.";
				$list['main_content'] = "message_view";
				$this->load->view('includes/template', $list);
				return;
			endif;
		endif;

		$this->load->model('chapter_model');

		if( !empty( $chapter_id ) ):
			if($this->chapter_model->get_chapter_by_id( $chapter_id ) === FALSE ):
				$list['error_msg'] = "Provided Chapter ID doesn't exist.Use the menu if you have access.";
				$list['main_content'] = "message_view";
				$this->load->view('includes/template', $list);
				return;
			endif;
			$chapter_id = !empty($chapter_id)? $chapter_id: $this->chapter_model->get_chapter_by_hadith_and_book_id( $hadith_book_id, $book_id )->chapter_id;
		endif;

		if(!empty( $hadith_in_book_id ) AND $this->hadith_book_model->get_hadith_in_book_by_id( $hadith_in_book_id ) === FALSE ):
			$list['error_msg'] = "Provided Hadith In Book ID doesn't exist.Use the menu if you have access.";
			$list['main_content'] = "message_view";
			$this->load->view('includes/template', $list);
			return;
		endif;

		$list['ahadith'] ='';

		if( !empty( $hadith_book_id ) ):
			$this->load->model('hadith_model');
			$list['ahadith'] = $this->hadith_model->get_ahadith_by_hadith_book_id( $hadith_book_id, $book_id, $chapter_id, $hadith_in_book_id );
			
			$this->load->model('tag_model');
			
			for( $i=0;$i<count($list['ahadith']);$i++ ):
				$list['ahadith'][$i]->hadith_tags = $this->tag_model->get_hadith_tag_by_hadith_id_and_user_id( $list['ahadith'][$i]->hadith_id, $user_id );
				$list['ahadith'][$i]->chapter_title_en = $this->chapter_model->get_chapter_by_id( $list['ahadith'][$i]->chapter_id )->chapter_title_en;
			endfor;
			
		endif;
		
		$list['ahadith_books'] = $this->hadith_book_model->get_books_by_hadith_book_id( $hadith_book_id );
		
		$book_id = !empty($book_id)? $book_id: $list['ahadith_books'][0]->book_id;	
		
		$list['book'] = $this->book_model->get_book_by_id( $book_id );
		$list['chapter'] = $this->chapter_model->get_chapter_by_hadith_and_book_id( $hadith_book_id, $book_id )[0];
		$list['hadith_book'] = $this->hadith_book_model->get_hadith_book_by_id( $hadith_book_id );
		
		$this->load->model('tag_model');
		$list['tags'] = $this->tag_model->get_all_tags();
		
		$this->load->helper('form');
		
		$list['main_content'] ='hadith_book/index';
		
		$this->load->view('includes/template', $list);
	}

	/*Method to create hadith_book
	 *
	 *@return none
	 *
	 */
	
	public function create(){

		$this->load->helper('form');
		
		$data['hadith_book_id'] = $this->input->post('hadith_book_id');
		$data['hadith_book_title_ar'] = $this->input->post('hadith_book_title_ar');
		$data['hadith_book_title_en'] = $this->input->post('hadith_book_title_en');
		$data['hadith_book_title_ur'] = $this->input->post('hadith_book_title_ur');

		$this->load->model('hadith_book_model');
		$this->hadith_book_model->insert_hadith_book($data);
		
		$list['main_content'] = 'hadith_book/create'; 
		$this->load->view('includes/template',$list);

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
	
	public function update(){
		$hadith_book_id = $this->input->post('hadith_book_id');
		$hadith_book_title_ar = $this->input->post('hadith_book_title_ar');
		$hadith_book_title_en = $this->input->post('hadith_book_title_en');
		$hadith_book_title_ur = $this->input->post('hadith_book_title_ur');
		
		$this->load->model('hadith_book_model');
		$this->hadith_book_model->update_hadith_book($hadith_book_id, $hadith_book_title_ar, $hadith_book_title_en, $hadith_book_title_ur);

		redirect('/hadith_book/', 'location');
	}

	/* Method to delete hadith_book
	 *
	 * @param string $hadith_book_id Id of hadith_book
	 *
	 * @return none
	 */
	
	public function delete($hadith_book_id){

		$this->load->model('hadith_book_model');
		$this->hadith_book_model->delete_hadith_book_by_id($hadith_book_id);
	}
}
