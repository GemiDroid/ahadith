<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hadith extends CI_Controller {

  //public function _remap($route){
    //echo $route;
//  }
  public function index(){
    echo 'running';
  }
  public function display(){
    $this->load->model('hadith_model');
    $data['ahadith'] = $this->hadith_model->get_all_hadith();
    //echo "<pre>";
    //print_r($data);
    $this->load->view('hadith_view',$data);


  }


  public function read($hadith_code){
      $this->load->model('hadith_model');
      $data['hadith'] =  $this->hadith_model->get_hadith_by_code($hadith_code);
      $this->load->view('read_hadith_view',$data);

  }

  public function add(){
    $this->load->helper('form');
    $this->load->view('add_hadith_view');
    if( !empty($this->input->post('mysubmit'))):
      $data['hadith_plain_ar'] = $this->input->post('txt_plain_ar');
      $data['hadith_plain_en'] = $this->input->post('txt_plain_en');
      $data['hadith_plain_ur'] = $this->input->post('txt_plain_ur');
      $data['hadith_marked_ar'] = $this->input->post('txt_marked_ar');
      $data['hadith_marked_en'] = $this->input->post('txt_marked_en');
      $data['hadith_marked_ur'] = $this->input->post('txt_marked_ur');
      $data['hadith_raw_ar'] = $this->input->post('txt_raw_ar');
      $data['authenticity_id'] = $this->input->post('authenticity_id');

      $this->load->model('hadith_model');
      $this->hadith_model->insert_hadith($data);

      echo "Successfully inserted Hadith";

    endif;

  }

  public function update($hadith_code){
    $this->load->model('hadith_model');
    $data['hadith_code'] = $hadith_code;
    $data['hadith'] =  $this->hadith_model->get_hadith_by_code($hadith_code);

    var_dump($data);

    $this->load->helper('form');
    $this->load->view('update_hadith_view',$data);
    if( !empty($this->input->post('mysubmit'))):
      $hadith['hadith_plain_ar'] = $this->input->post('txt_plain_ar');
      $hadith['hadith_plain_en'] = $this->input->post('txt_plain_en');
      $hadith['hadith_plain_ur'] = $this->input->post('txt_plain_ur');
      $hadith['hadith_marked_ar'] = $this->input->post('txt_marked_ar');
      $hadith['hadith_marked_en'] = $this->input->post('txt_marked_en');
      $hadith['hadith_marked_ur'] = $this->input->post('txt_marked_ur');
      $hadith['hadith_raw_ar'] = $this->input->post('txt_raw_ar');
      $hadith['reliability'] = $this->input->post('reliability');

      $this->load->model('hadith_model');
      $this->hadith_model->update_hadith($hadith_code,$hadith);

      echo "Successfully updated Hadith";

    endif;



  }

  public function delete( $hadith_code ){

    $this->load->helper('url');

    $this->load->model('hadith_model');
    $this->hadith_model->delete_hadith( $hadith_code );

    echo "Deleted Hadith";
  }

}
