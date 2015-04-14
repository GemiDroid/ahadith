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

		$this->load->model('hadith_book_model');

		if(!empty( $hadith_book_id ) AND $this->hadith_book_model->get_hadith_book_by_id( $hadith_book_id ) === FALSE ):
			echo "Provided Hadith Book ID doesn't exist.";
			return;
		endif;

		$this->load->model('book_model');

		if(!empty( $book_id ) AND $this->book_model->get_book_by_id( $book_id ) === FALSE ):
			echo "Provided Book ID doesn't exist.";
			return;
		endif;

		$this->load->model('chapter_model');

		if(!empty( $chapter_id ) AND $this->chapter_model->get_chapter_by_id( $chapter_id ) === FALSE ):
			echo "Provided Chapter ID doesn't exist.";
			return;
		endif;

		if(!empty( $hadith_in_book_id ) AND $this->hadith_book_model->get_hadith_in_book_by_id( $hadith_in_book_id ) === FALSE ):
			echo "Provided Hadith In Book ID doesn't exist.";
			return;
		endif;

		$list['ahadith'] ='';

		if( !empty( $hadith_book_id ) ):
			$this->load->model('hadith_model');
			$list['ahadith'] = $this->hadith_model->get_ahadith_by_hadith_book_id( $hadith_book_id, $book_id, $chapter_id, $hadith_in_book_id );
		endif;
		
		$list['ahadith_books'] = $this->hadith_book_model->get_all_hadith_books();
		
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
