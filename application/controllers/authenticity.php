<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authenticity extends CI_Controller {

  public function index(){
    echo 'running';
  }
  public function display(){
    $this->load->model('authenticity_model');
    $data['ahadith'] = $this->authenticity_model->get_authenticity();
    //echo "<pre>";
    //print_r($data);
    $this->load->view('display_authenticity_view',$data);


  }

  public function read($authenticity_id){
      $this->load->model('authenticity_model');
      $data['authenticity'] =  $this->authenticity_model->get_authenticity_by_id($authenticity_id);
      $this->load->view('read_authenticity_view',$data);

  }

  public function add(){
    $this->load->helper('form');
    $this->load->view('add_authenticity_view');
    if( !empty($this->input->post('mysubmit'))):
      $data['authenticity_title_ar'] = $this->input->post('txt_title_ar');
      $data['authenticity_title_en'] = $this->input->post('txt_title_en');
      $data['authenticity_title_ur'] = $this->input->post('txt_title_ur');
      $data['authenticity_order'] = $this->input->post('txt_order');


      $this->load->model('authenticity_model');
      $this->authenticity_model->insert_authenticity($data);

      echo "Successfully inserted";

    endif;

  }

  public function update($authenticity_id){
    $this->load->model('authenticity_model');
    $data['authenticity_id'] = $authenticity_id;
    $data['authenticity'] =  $this->authenticity_model->get_authenticity_by_id($authenticity_id);

    var_dump($data);

    $this->load->helper('form');
    $this->load->view('update_authenticity_view',$data);
    if( !empty($this->input->post('mysubmit'))):
      $authenticity['authenticity_title_ar'] = $this->input->post('txt_title_ar');
      $authenticity['authenticity_title_en'] = $this->input->post('txt_title_en');
      $authenticity['authenticity_title_ur'] = $this->input->post('txt_title_ur');
      $authenticity['authenticity_order'] = $this->input->post('txt_order');


      $this->load->model('authenticity_model');
      $this->authenticity_model->update_authenticity($authenticity_id,$authenticity);
      //redirect('/authenticity/display/');
      echo "Successfully updated";

    endif;



  }

  public function delete( $authenticity_id ){

    $this->load->helper('url');

    $this->load->model('authenticity_model');
    $this->authenticity_model->delete_authenticity( $authenticity_id );
    redirect('/authenticity/display/');

    echo "Deleted";
  }


}
