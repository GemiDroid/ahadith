<?php


class Hadith_book extends CI_Controller{


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


		$this->load->view('hadith_book/index', $list);


	}

	public function create(){


		$this->load->helper('form');

		$data['hadith_book_id'] = $this->input->post('hadith_book_id');
		$data['hadith_book_title_ar'] = $this->input->post('hadith_book_title_ar');
		$data['hadith_book_title_en'] = $this->input->post('hadith_book_title_en');
		$data['hadith_book_title_ur'] = $this->input->post('hadith_book_title_ur');

		$this->load->model('hadith_book_model');
		$this->hadith_book_model->insert_hadith_book($data);
		$this->load->view('hadith_book/create');

	}

	public function store(){

		$hadith_book_id = $this->input->post('hadith_book_id');
		$hadith_book_title_ar = $this->input->post('hadith_book_title_ar');
		$hadith_book_title_en = $this->input->post('hadith_book_title_en');
		$hadith_book_title_ur = $this->input->post('hadith_book_title_ur');


		$this->hadith_book_model->insert_hadith_book($hadith_book_id, $hadith_book_title_ar,$hadith_book_title_en, $hadith_book_title_ur);


		echo 'Successfully added';

	}


	public function read($id){

	}

	public function edit($id){


		$query = $this->hadith_book_model->get_hadith_book_by_id($id);
		$book = $query->row();

		$url = base_url("hadith_book/update");

		$list['book'] = $book;
		$list['url'] = $url;
		$this->load->view('hadith_book/edit', $list);
	}

	public function update(){
		$hadith_book_id = $this->input->post('hadith_book_id');
		$hadith_book_title_ar = $this->input->post('hadith_book_title_ar');
		$hadith_book_title_en = $this->input->post('hadith_book_title_en');
		$hadith_book_title_ur = $this->input->post('hadith_book_title_ur');


		$this->hadith_book_model->update_hadith_book($hadith_book_id, $hadith_book_title_ar, $hadith_book_title_en, $hadith_book_title_ur);


		redirect('/hadith_book/', 'location');
	}

	public function delete($hadith_book_id){


		$this->load->model('hadith_book_model');
		$this->hadith_book_model->delete_hadith_book_by_id($hadith_book_id);






	}
}
