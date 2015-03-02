<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chapter extends CI_COntroller {

  public function index(){
    echo 'running';
  }
  public function display(){
    $this->load->model('chapter_model');
    $data['ahadith'] = $this->chapter_model->get_all_chapters();
    //echo "<pre>";
    //print_r($data);
    $this->load->view('chapter_view',$data);


  }


  public function read($chapter_id){
      $this->load->model('chapter_model');
      $data['chapter'] =  $this->chapter_model->get_chapter_by_id($chapter_id);
      $this->load->view('read_chapter_view',$data);

  }

  public function add(){

        //echo "add function";
    $this->load->model('book_model');
    $data1['books'] = $this->book_model->get_all_books();
    $data1['hadith_books'] = $this->book_model->get_all_hadith_books();


    $this->load->helper('form');
    $this->load->view('add_chapter_view',$data1);
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

    //redirect('/editor/chapter/add');

  }

  public function update($chapter_id){

    $this->load->model('book_model');
    $data1['books'] = $this->book_model->get_all_books();
    $data1['hadith_books'] = $this->book_model->get_all_hadith_books();

    $this->load->model('chapter_model');
    $data1['chapter_id'] = $chapter_id;
    $data1['chapter'] =  $this->chapter_model->get_chapter_by_id($chapter_id);

    //var_dump($data1);

    $this->load->helper('form');
    $this->load->view('update_chapter_view',$data1);
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

  public function delete( $chapter_id){

    $this->load->helper('url');

    $this->load->model('chapter_model');
    $this->chapter_model->delete_chapter( $chapter_id );

    echo "Deleted Chapter";
  }

}
