<?php


class Hadith_book extends CI_Controller{

	

	public function index(){
		
		
		$result = $this->hadith_book_model->get_all_hadith_books();
		$list['hadith_books'] = $result;
		
		$url = base_url("hadith_book/create");
		$list['add_link'] = $url;

		$this->load->view('hadith_book/index', $list);
	}

	public function create(){
		
		$url = base_url("hadith_book/store");

		$list['url'] = $url;
		$this->load->view('hadith_book/create', $list);
	}

	public function store(){
		
		$hadith_book_id = $this->input->post('hadith_book_id');
		$hadith_book_title_ar = $this->input->post('hadith_book_title_ar');
		$hadith_book_title_en = $this->input->post('hadith_book_title_en');
		$hadith_book_title_ur = $this->input->post('hadith_book_title_ur');

		
		$res =	$this->hadith_book_model->insert_hadith_book($hadith_book_id, $hadith_book_title_ar,$hadith_book_title_en, $hadith_book_title_ur);
		if($res === false){
		
			redirect('hadith_book/', 'location');			
		}else{
			echo $res;
		}



		


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

		
		
		$res = $this->hadith_book_model->delete_hadith_book_by_id($hadith_book_id);
		if($res){
			redirect('hadith_book/', 'location');			
		}else{
			echo $res;
		}

		
		

	}
}