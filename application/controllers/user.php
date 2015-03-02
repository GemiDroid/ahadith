<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_COntroller {

  public function index(){

  }

  public function registration(){

    $this->load->model('country_model');
    $list['country'] = $this->country_model->get_all_countries();

    $this->load->helper('form');

    $this->load->library('form_validation');

    $this->form_validation->set_rules('txt_username', 'Username', 'required');
    $this->form_validation->set_rules('txt_password', 'Password', 'required');
    $this->form_validation->set_rules('txt_confirm_password', 'Password Confirmation', 'required|matches[txt_password]');
    $this->form_validation->set_rules('txt_email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('txt_gender', 'Gender', 'required');
    $this->form_validation->set_rules('day', 'Day', 'required');
    $this->form_validation->set_rules('month', 'Month', 'required');
    $this->form_validation->set_rules('year', 'Year', 'required');
    //$this->form_validation->set_rules('txt_date_of_birth', 'Date of birth', 'required');
    $this->form_validation->set_rules('ddl_country_list', 'Country', 'required');
    $this->form_validation->set_rules('txt_full_name', 'Full Name', 'required');


    if ($this->form_validation->run() == FALSE):
      $this->load->view('user/user_registration_view',$list);

    else:

      //$this->load->view('formsuccess');
      //$this->load->view('user_view',$data1);


          $data['user_id'] = $this->input->post('txt_username');
          $data['password'] = $this->input->post('txt_password');
          $data['email_address'] = $this->input->post('txt_email');
          $data['full_name'] = $this->input->post('txt_full_name');
          $data['date_of_birth'] = $this->input->post('year').'-'.$this->input->post('month').'-'.$this->input->post('day');
          $data['gender'] = $this->input->post('txt_gender');
          $data['country_code'] = $this->input->post('ddl_country_list');

          $this->load->model('user_model');
          $valid_user = $this->user_model->validate_user($data['user_id']);
          $valid_email = $this->user_model->validate_user_by_email($data['email_address']);
          //var_dump($valid_user);
        //foreach($user as $row):

          if($valid_user == FALSE && $valid_email == FALSE):

            $this->load->model('user_model');
            $this->user_model->insert_user($data);

            $this->load->library('session');
            $this->session->set_userdata('user_id',$data['user_id']);
            redirect('user/home');


            echo "Successfully Registered";

          else:
            redirect('user/signin');
          endif;





    endif;


  }



}
