<?php
	class User extends CI_Controller {

	  function signin(){

		$this->load->library('session');

		//if the user is already signed-in then redirect him/her to the home()
		$user_id = $this->session->userdata('user_id');
        if( isset($user_id) && !empty($user_id) ):
            redirect('user/home');
        endif;

        $list = '';

        $this->load->helper('form');

        $this->load->library('form_validation');

		$this->form_validation->set_rules('txt_user_id', 'User ID', 'required');
		$this->form_validation->set_rules('txt_user_pwd', 'Password', 'required');

        if ($this->form_validation->run() == FALSE):

		  $this->load->view('user/user_signin_view', $list);

        else:

		  //in case of a validated authentication
          $user_id = $this->input->post('txt_user_id');

		  $this->load->model('user_model');

		  //pass user_id which is the email and get the user_id if valid
		  $valid_user = $this->user_model->validate_user( $user_id );

	      //if user doesn't exist.
		  if( $valid_user === FALSE || $valid_user === NULL ):
			redirect('user/register');
		  endif;

          $user_data["user_id"] = $this->input->post('txt_user_id');
          $this->session->set_userdata('user_id' , $user_data["user_id"]);
          redirect('user/home');

		endif;
      }

	  /*
       * Delete user session data and redirect to signin
       *
       * @return none
      */

	  function signout() {

		$this->load->library('session');
        //destroy the session data
        $this->session->unset_userdata('user_id');

		//return to the signin page
        redirect('user/signin');
      }

	  function forgot_password(){
		$this->load->helper('form');

		$user_id = $this->input->post('txt_user_id');
		$btn_send_pwd = $this->input->post('btn_send_pwd');

		$list['error_user'] ='';
		$list['success_user'] ='';

		if( !empty($btn_send_pwd) ):

			if( empty( $user_id ) ):

				$list['error_user'] = "The User ID field is required.";

			else:

				$this->load->model('user_model');

				$user = $this->user_model->validate_user($user_id);

				if( $user === FALSE ):
					$list['error_user'] = "No User ID has been found.";
				else:
					$this->user_model->update_user( $user_id,array('password'=>'123456') );
					$list['success_user'] = "Your new password is 123456.";

				endif;

			endif;

		endif;

		$this->load->view('user/user_forgot_password_view',$list);
	  }

	  function forgot_username(){
		$this->load->helper('form');

		$user_email = $this->input->post('txt_user_email');
		$btn_send_username = $this->input->post('btn_send_username');

		$list['error_user'] ='';
		$list['success_user'] ='';

		if( !empty($btn_send_username) ):

			if( empty( $user_email ) ):

				$list['error_user'] = "The User Email field is required.";

			else:

				$this->load->model('user_model');

				$user = $this->user_model->get_user_by_email($user_email);

				if( $user === FALSE ):
					$list['error_user'] = "No User Email has been found.";
				else:
					$list['success_user'] = "Username has been sent to your email address.";

					$this->load->library('email');

					$config = array();
					$config['protocol']='smtp';
					$config['smtp_host']='ssl://smtp.googlemail.com';
					$config['smtp_port']='465';
					$config['smtp_timeout']='30';


					$config['smtp_user'] = $from = 'trust.manager@mishkat.pk';
					$config['smtp_pass'] = 'T1234567m';


					$config['charset']='utf-8';
					$config['newline']="\r\n";
					$config['mailtype']="html";

					$this->email->initialize($config);

					$this->email->from( $from );
					$this->email->to( $user_email );

					$this->email->subject( 'Username Updated: Ahadith.net' );
					$this->email->message( '[Your new user name is: xyz]' );

					$output = $this->email->send();

				endif;

			endif;

		endif;

		$this->load->view('user/user_forgot_username_view',$list);
	  }


      function home(){
        $this->load->library('session');
        $user_id = $this->session->userdata('user_id');

        $this->load->view('user/user_home_view');
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
