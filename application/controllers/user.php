<?php

	class User extends CI_Controller {		
		
		function _remap( $method, $param ) {
			
			if( $method == 'signin' ):
				$this->signin();
			elseif( $method == 'signout' ):
				$this->signout();
			elseif( $method == 'forgot-password' ):
				$this->forgot_password();
			elseif( $method == 'forgot-username' ):
				$this->forgot_username();
			elseif( $method == 'home' ):
				$this->home();
			elseif( $method == 'display' ):
				$this->display();
			elseif( $method == 'update' ):
				if( !isset( $param[0] ) ):
					$param[0] = '';
				endif;
				$this->update($param[0]);
			elseif( $method == 'delete' ):
				if( !isset( $param[0] ) ):
					$param[0] = '';
				endif;
				$this->delete($param[0]);
			elseif( $method == 'add' ):
				$this->add();
			elseif( $method == 'register' ):
				$this->register();
			elseif( $method == 'change-password' ):
				$this->change_password();
			elseif( $method == 'edit-profile' ):
				$this->edit_profile();
			elseif( $method == 'user_favorite' ):
				 if( !isset( $param[0] ) ):
					$param[0] = '';
					endif;
				$this->user_favorite($param[0]);
				
			//for all other method names, display an error message
			else:
				$list['error_msg'] = "The Page you are trying to view does not exists. Use the menu if you have access.";
				$list['main_content'] = "message_view";
				$this->load->view('includes/template', $list);
			endif;
		}
		
		/*
         * Signin the user
         *
         * @return none
         */
		
		function signin(){
			
			//if the user is already signed-in then redirect him/her to the home()
			$user_id = $this->session->userdata('user_id');
			
			if( isset($user_id) && !empty($user_id) ):
				redirect('user/home');
			endif;
			
			$list = '';
			
			$this->load->helper('form');	
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('txt_user_id', 'User ID', 'required|trim');
			$this->form_validation->set_rules('txt_user_pwd', 'Password', 'required|trim');
			
			$list['main_content'] = 'user/user_signin_view';
			
			if ($this->form_validation->run() == FALSE):
			  $this->load->view('includes/template', $list);
			  
			else:
			  //in case of a validated authentication
			  $user_id = $this->input->post('txt_user_id');
			  $user_password = $this->input->post('txt_user_pwd');
			  
			  
			  
	
			  $this->load->model('user_model');
	
			  //pass user_id  and user_password , also check for active user.
			  $valid_user = $this->user_model->validate_user( $user_id, $user_password );
			  $role = $this->user_model->get_user_role($user_id);
			  
			  
			  if( $valid_user || $valid_user === NULL):
				$user_data["user_id"] = $this->input->post('txt_user_id');
				$this->session->set_userdata('user_id' , $user_data["user_id"]);
			
			
				if($role || $role == NULL):
					$this->session->set_userdata('role_title' , $role);
				endif;
			  
				
				redirect('user/home');
				
				
			  endif;
			
			  //if user doesn't exist.
			  //redirect('user/signin');
			  
			 $list = array(
					'error_message' => 'Invalid Username or Password'
					);
			  $list['main_content'] = 'user/user_signin_view';
			  $this->load->view('includes/template', $list);
			endif;
		}

		/*
		 * Delete user session data and redirect to signin
		 *
		 * @return none
		*/

		function signout() {

			$user_data = $this->session->all_userdata();
			
			foreach( $user_data as $key=>$value ):
				//destroy the session data
				$this->session->unset_userdata( $key );
			endforeach;
			

			//return to the signin page
			redirect('user/signin');
		}
	
		/*
		 * Reset user password
		 *
		 * @return none
		*/
		
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
			$list['main_content'] = 'user/user_forgot_password_view';
			$this->load->view('includes/template',$list);
		}

		/*
		 * Send username on its email address
		 *
		 * @return none
		*/
		
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
			$list['main_content'] = 'user/user_forgot_username_view';
			$this->load->view('includes/template',$list);
		}

		/*
         * User home page
         *
         * @return none
         */

	function home(){
			
		$this->load->model('user_model');
		$list['user_id'] = $user_id = $this->session->userdata('user_id');
		
		//$list['ahadith'] = $this->user_model->get_all_hadith();
		$this->load->model('hadith_book_model');
		$this->load->model('book_model');
		$this->load->model('chapter_model');
		//$list = array();
		$list['ahadith'] = $this->hadith_book_model->get_all_view_hadith_in_book();
		//$list['ahadith'] = $this->user_model->get_user_role($user_id);
		//var_dump($list['ahadith'][0]);
		
		if( !empty( $list['ahadith'][0]->hadith_book_id ) ):
			$this->load->model('hadith_model');
			$list['ahadith'] = $this->hadith_model->get_ahadith_by_hadith_book_id( $list['ahadith'][0]->hadith_book_id, $list['ahadith'][0]->book_id, $list['ahadith'][0]->chapter_id, $list['ahadith'][0]->hadith_in_book_id );
			
			$this->load->model('tag_model');
			
			for( $i=0;$i<count($list['ahadith']);$i++ ):
				$list['ahadith'][$i]->hadith_tags = $this->tag_model->get_hadith_tag_by_hadith_id_and_user_id( $list['ahadith'][$i]->hadith_id, $user_id );
				$list['ahadith'][$i]->chapter_title_en = $this->chapter_model->get_chapter_by_id( $list['ahadith'][$i]->chapter_id )->chapter_title_en;
				//$list['ahadith'][$i]->role_name = $this->user_model->get_user_role( $list['user_id'])->role_title;
			endfor;
			
		endif;
		
		$list['book'] = $this->book_model->get_book_by_id( $list['ahadith'][0]->book_id );
		$list['chapters'] = $this->chapter_model->get_chapter_by_hadith_and_book_id( $list['ahadith'][0]->hadith_book_id, $list['ahadith'][0]->book_id );
		$list['hadith_book'] = $this->hadith_book_model->get_hadith_book_by_id( $list['ahadith'][0]->hadith_book_id );
		$list['ahadith_books'] = $this->hadith_book_model->get_books_by_hadith_book_id( $list['ahadith'][0]->hadith_book_id );
		$this->load->model('tag_model');
		$this->load->model('user_model');
		
		//get tags by user_id
		$list['tags'] = $this->tag_model->get_all_tags( $user_id );
		
		$this->load->model('user_model');
		//get role by user_id
		$list['role'] = $this->user_model->get_user_role($user_id);
		
		$this->load->helper('form');
		
		//pagination code	
		$this->load->library('pagination');
		$config['base_url'] =  base_url().$list['hadith_book']->hadith_book_id.'/book/'. $list['book']->book_id .'/chapter/';
		$config['total_rows'] = count( $list['chapters'] )+1;
		$config['per_page'] = 10;
		$this->pagination->initialize( $config );
		$list['pages'] = $this->pagination->create_links();
		

		$list['main_content'] = 'hadith_book/index';
		$this->load->view('includes/template',$list);
		

		if( isset( $user_id ) && !empty($user_id) ):
			
			$this->load->model('hadith_book_model');
			//get first hadith book id
			$hadith_book_id = $this->hadith_book_model->get_hadith_books()[0]->hadith_book_id;
			//redirect to hadith view page
			redirect($hadith_book_id);
		else:
			redirect('user/signin');
		endif;	

	}

	function user_favorite($hadith_id){
		
		$user_id = $this->session->userdata('user_id');
		
		$this->load->model('user_model');
		$list['hadith_in_book'] =  $this->user_model->get_hadith_in_book($hadith_id);
		var_dump($list);
		$data = false;
		foreach($list as $row):
			$data->hadith_in_book_id = $row->hadith_in_book_id;
			$data->hadith_book_id = $row->hadith_book_id;
			$data->user_id = $user_id;
		endforeach;
		$this->user_model->insert_user_favorite($data);
		
		redirect('user/home');
	}
		/*
         * User registration
         *
         * @return none
         */
		
		function register(){

		    $this->load->model('country_model');
		    $list['country'] = $this->country_model->get_all_countries();

			$this->load->helper('form');

			$this->load->library('form_validation');

			$this->form_validation->set_rules('txt_username', 'Username', 'required');
			$this->form_validation->set_rules('txt_password', 'Password', 'required');
			$this->form_validation->set_rules('txt_confirm_password', 'Password Confirmation', 'required|matches[txt_password]');
			$this->form_validation->set_rules('txt_email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('rad_gender', 'Gender', 'required');
			$this->form_validation->set_rules('day', 'Day', 'required');
			$this->form_validation->set_rules('month', 'Month', 'required');
			$this->form_validation->set_rules('year', 'Year', 'required');
			$this->form_validation->set_rules('ddl_country_list', 'Country', 'required');
			$this->form_validation->set_rules('txt_full_name', 'Full Name', 'required');

			$list['main_content'] = 'user/user_registration_view';
			if ($this->form_validation->run() == FALSE):
			  $this->load->view('includes/template',$list);
	
			else:
				$data['user_id'] = $this->input->post('txt_username');
				$data['password'] = $this->input->post('txt_password');
				$data['email_address'] = $this->input->post('txt_email');
				$data['full_name'] = $this->input->post('txt_full_name');
				$data['date_of_birth'] = $this->input->post('year').'-'.$this->input->post('month').'-'.$this->input->post('day');
				$data['gender'] = $this->input->post('rad_gender');
				$data['country_code'] = $this->input->post('ddl_country_list');
	
				$this->load->model('user_model');
				$valid_user = $this->user_model->validate_user($data['user_id']);
				$valid_email = $this->user_model->validate_user_by_email($data['email_address']);
	
				if($valid_user == FALSE && $valid_email == FALSE):
	
				  $this->load->model('user_model');
				  $this->user_model->insert_user($data);
	
				  $this->session->set_userdata('user_id',$data['user_id']);
				  redirect('user/home');
				  echo "Successfully Registered";
	
				else:
					redirect('user/signin');
				endif;
	
			endif;

}


	function change_password(){
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('user_model');
		$list['user_id'] = $user_id = $this->session->userdata('user_id');
		
		$list['user'] = $this->user_model->get_user_by_id($list['user_id']);
		$old_password = $list['user']->password; 
		//var_dump($old_password);
		
		$confirm_pass = $this->input->post('txt_confirm_password');
		
		$list['error_user'] ='';
		$list['error_user1'] ='';
		$list['error_user2'] ='';
		$list['success_user'] ='';
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('txt_old_password','Old Password','required');
		$this->form_validation->set_rules('txt_new_password','New Password','required');
		$this->form_validation->set_rules('txt_confirm_password','Confirm Password','required|matches[txt_new_password]');
	
		
		
		if ($this->form_validation->run() == TRUE):
		   
		   //update_password
		  $string =  $this->user_model->update_password();
		   echo $string;
		   
		endif;
		
		$list['main_content'] = 'user/user_change_password_view';
		
		$this->load->view('includes/template',$list);
		
	}
	
	
	function edit_profile(){
		
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->load->model('country_model');
		$list['country'] = $this->country_model->get_all_countries();

		$this->load->model('user_model');
		$list['user_id'] = $user_id = $this->session->userdata('user_id');
		//var_dump($user_id);
		$list['user'] =  $this->user_model->get_user_by_id($user_id);
			//var_dump($list['user']);
		$list['main_content'] = 'user/user_edit_profile_view';
		$this->load->view('includes/template',$list);
		
		$this->form_validation->set_rules('txt_email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('rad_gender', 'Gender', 'required');
		$this->form_validation->set_rules('day', 'Day', 'required');
		$this->form_validation->set_rules('month', 'Month', 'required');
		$this->form_validation->set_rules('year', 'Year', 'required');
		$this->form_validation->set_rules('ddl_country_list', 'Country', 'required');
		$this->form_validation->set_rules('txt_full_name', 'Full Name', 'required');

		$list['main_content'] = 'user/user_edit_profile_view';
		if ($this->form_validation->run() == FALSE):
		  $this->load->view('includes/template',$list);

		else:
			if( !empty($this->input->post('btn_save'))):
				$data['email_address'] = $this->input->post('txt_email');
				$data['full_name'] = $this->input->post('txt_full_name');
				$data['date_of_birth'] = $this->input->post('year').'-'.$this->input->post('month').'-'.$this->input->post('day');
				$data['gender'] = $this->input->post('rad_gender');
				$data['country_code'] = $this->input->post('ddl_country_list');
	
				  $this->load->model('user_model');
				  //$this->user_model->update_user($user_id,$data);
				$this->user_model->update_user($data);
				  //$this->session->set_userdata('user_id',$data['user_id']);
				  //redirect('user/home');
				  echo "Successfully updated";
			endif;

		endif;
	}
	
	
	
	
	
	  public function display(){
    
    $this->load->helper('form');
    $this->load->model('user_model');
    $list['user_roles'] = $this->user_model->get_all_user_role();
    $list['main_content'] = 'admin/user_role_view';
    
    $this->load->view('admin/includes/template',$list);
  }

  /*Method to add role
   *
   *@return none
   */
  
  public function add(){
  
  
	$this->load->helper('form');
	$this->load->model('user_model');
	$this->load->model('role_model');
	$list['users'] = $this->user_model->get_all_users();
	$list['roles'] = $this->role_model->get_all_roles();
    $list['main_content'] = 'admin/add_user_role_view';
    
    $this->load->helper('form');
    $this->load->view('admin/includes/template',$list);
    
    if( !empty($this->input->post('mysubmit'))):
      $data['user_id'] = $this->input->post('ddl_user_list');
      $data['role_title'] = $this->input->post('ddl_role_list');
    
  
      $this->load->model('user_model');
      $this->user_model->insert_user_role($data);
  
      redirect('admin/user-role');
  
    endif;
  }

  /*Method to update role
   *
   *@param string $role_title ID of role
   *
   *@return none
   *
   */
  
  public function update($user_id){
    
    $this->load->helper('form');
    $this->load->model('user_model');
     $list['user_id'] = $user_id;
    $list['user_role'] =  $this->user_model->get_all_role();
    $list['main_content'] = 'admin/update_user_role_view';
    $this->load->view('admin/includes/template',$list);
    
    if( !empty($this->input->post('mysubmit'))):
	
      $data['role_title'] = $this->input->post('ddl_role_list');

      $this->load->model('user_model');
      $this->user_model->update_user_role($user_id,$data);

      redirect('admin/user-role');
    

    endif;
  }

  /*Method to delete role
   *
   *@param string $role_title ID of role
   *
   *@return none
   */
  
  public function delete( $user_id){

    $this->load->helper('url');
    $this->load->model('user_model');
    $this->user_model->delete_user_role( $user_id );
  
    redirect('admin/user-role');
  }
}
