<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
  
    function _remap( $method, $param ) {
        if( $method == 'index' ):
            $this->index();
        elseif( $method == 'tag' ):
			
			if( !isset( $param[0] ) ):
				$param[0] = '';
			endif;
	    
			if( !isset( $param[1] ) ):
				$param[1] = '';
			endif;
            $this->tag($param[0],$param[1]);
			
		elseif( $method == 'report' ):  
			//set default for parameter user_id
			if( !isset( $param[0] ) ):
				$param[0] = '';
			endif;
	  
			if( !isset( $param[1] ) ):
				$param[1] = '';
			endif;
	  
			$this->report( $param[0],$param[1] );
			
		elseif( $method == 'user_status' ):
            $this->user_status();
			
		elseif( $method == 'user-role' ):
			if( !isset( $param[0] ) ):
				$param[0] = '';
			endif;
	  
			if( !isset( $param[1] ) ):
				$param[1] = '';
			endif;
            $this->user_role($param[0],$param[1]);  
		elseif( $method == 'hadith-book' ):
			if( !isset( $param[0] ) ):
				$param[0] = '';
			endif;
	    
			if( !isset( $param[1] ) ):
				$param[1] = '';
			endif;
            $this->hadith_book($param[0],$param[1]);
		elseif( $method == 'hadith-in-book' ):  
			//set default for parameter user_id
			if( !isset( $param[0] ) ):
				$param[0] = '';
			endif;
	
			if( !isset( $param[1] ) ):
				$param[1] = '';
			endif;
		
			$this->hadith_in_book( $param[0], $param[1]);	
        elseif( $method == 'users' ):
            $this->users();
			
		elseif( $method == 'user-activities' ):
			$this->user_activities();
			
		elseif( $method == 'subscriptions' ):
            $this->subscriptions();
			
		elseif( $method == 'book' ):
			if( !isset( $param[0] ) ):
				$param[0] = '';
			endif;
	    
			if( !isset( $param[1] ) ):
				$param[1] = '';
			endif;
            $this->book($param[0],$param[1]);
		elseif( $method == 'hadith' ):
			//set default for parameter user_id
			if( !isset( $param[0] ) ):
				$param[0] = '';
			endif;
	  
			if( !isset( $param[1] ) ):
				$param[1] = '';
			endif;
			$this->hadith( $param[0],$param[1] );
		elseif( $method == 'chapter' ):
      
			//set default for parameter user_id
			if( !isset( $param[0] ) ):
				$param[0] = '';
			endif;
			if( !isset( $param[1] ) ):
				$param[1] = '';
			endif;
	  
			$this->chapter( $param[0],$param[1] );
		elseif( $method == 'role' ):
      
			//set default for parameter user_id
			if( !isset( $param[0] ) ):
				$param[0] = '';
			endif;
	  
			if( !isset( $param[1] ) ):
				$param[1] = '';
			endif;
	  
			$this->role( $param[0],$param[1] );
	 
		elseif( $method == 'authenticity' ):
      
			//set default for parameter user_id
			if( !isset( $param[0] ) ):
				$param[0] = '';
			endif;
	  
			if( !isset( $param[1] ) ):
				$param[1] = '';
			endif;
	  
			$this->authenticity( $param[0],$param[1] );
	    
		elseif( $method == 'user' ):
      
			//set default for parameter user_id
			if( !isset( $param[0] ) ):
				$param[0] = '';
			endif;
	  
			$this->user( $param[0] ); 
        //for all other method names, display an error message
        else:
            $list['error_msg'] = "The Page you are trying to view does not exists. Use the menu if you have access.";
            $list['main_content'] = "message_view";
            $this->load->view('admin/includes/template', $list);
        endif;
    }
	
	
	function __construct(){
        parent::__construct();
		$this->load->model('user_model');
		$user_id = $this->session->userdata('user_id');
        $role = $this->session->userdata('role_title');
		if( !isset($user_id) OR empty($user_id) ):
			$message = 'You need to login.';
			$this->session->set_flashdata('message', $message);
			redirect('user/signin');
		else:
			if( empty($role) ):
				$message = 'You need to be an admin.';
				$this->session->set_flashdata('message', $message);
				redirect('user/signin');
			endif;
		endif;
        
    }

	
    function index(){
		$list['users'] = $this->user_model->get_all_users();
		$list['blocks'] = $this->user_model->get_block_users();
		$list['pending_tags'] = $this->user_model->get_pending_tags();
		$list['pending_reports'] = $this->user_model->get_pending_reports();
		$list['main_content'] = '/admin/admin_view';
		$this->load->view('admin/includes/template',$list);
    }
    
    function tag($action='',$id=''){
		if($action=='add'):
			//$hadith_book->add();
			$this->add_tag();
		elseif($action=='update'):
			$this->update_tag($id);
		elseif($action=='delete'):
			$this->delete_tag($id);
		else:
			//view tag
			$this->load->model('tag_model');
			$list['tags'] = $this->tag_model->get_tags();
			$list['main_content'] = '/admin/admin_tags_view';
			$this->load->view('admin/includes/template',$list);
		endif;
    }

	
	function add_tag(){

		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('txt_title_ar', 'English Title', 'required');
		$this->form_validation->set_rules('txt_title_en', 'Arabic Title', 'required');
		$this->form_validation->set_rules('txt_title_ur', 'Urdu Title', 'required');
		$this->form_validation->set_rules('txt_detail_ar', 'English Detail', 'required');
		$this->form_validation->set_rules('txt_detail_en', 'English Detail', 'required');
		$this->form_validation->set_rules('txt_detail_ur', 'English Detail', 'required');
		
		$list['main_content'] = 'admin/add_tag_view';
		
		if ($this->form_validation->run() == FALSE):
			$this->load->view('admin/includes/template',$list);
		
		else:
		  $data['tag_title_ar'] = $this->input->post('txt_title_ar');
		  $data['tag_title_en'] = $this->input->post('txt_title_en');
		  $data['tag_title_ur'] = $this->input->post('txt_title_ur');
		  $data['tag_detail_ar'] = $this->input->post('txt_detail_ar');
		  $data['tag_detail_en'] = $this->input->post('txt_detail_en');
		  $data['tag_detail_ur'] = $this->input->post('txt_detail_ur');
		  $data['suggested_by'] = $this->session->userdata('user_id');
		  $data['approved_by'] = $this->session->userdata('user_id');
		  
		  $this->load->model('tag_model');
		  $this->tag_model->add_tag($data);
		  
		  redirect('admin/tag');
		endif;
	}
    
    function update_tag($id){
		
		$this->load->model('tag_model');
	
		if( $this->tag_model->get_tag_by_id($id) == FALSE ):
			$list['error_msg'] = "No record found for the provided Tag ID. Use the menu if you have access.";
			$list['main_content'] = "message_view";
			$this->load->view('admin/includes/template', $list);
			return;
		endif;
	
		$this->load->helper('form');
		$this->load->library('form_validation');
	
		$this->form_validation->set_rules('txt_title_ar', 'English Title', 'required');
		$this->form_validation->set_rules('txt_title_en', 'Arabic Title', 'required');
		$this->form_validation->set_rules('txt_title_ur', 'Urdu Title', 'required');
		$this->form_validation->set_rules('txt_detail_ar', 'English Detail', 'required');
		$this->form_validation->set_rules('txt_detail_en', 'English Detail', 'required');
		$this->form_validation->set_rules('txt_detail_ur', 'English Detail', 'required');
		
		$list['tag'] = $this->tag_model->get_tag_by_id($id);
		$list['tag_id'] = $id;
		$list['main_content'] = '/admin/edit_tag_view';
		
		if ($this->form_validation->run() == FALSE):
			$this->load->view('admin/includes/template',$list);
		else:
			
			$data['tag_title_ar'] = $this->input->post('txt_title_ar');
			$data['tag_title_en'] = $this->input->post('txt_title_en');
			$data['tag_title_ur'] = $this->input->post('txt_title_ur');
			$data['tag_detail_ar'] = $this->input->post('txt_detail_ar');
			$data['tag_detail_en'] = $this->input->post('txt_detail_en');
			$data['tag_detail_ur'] = $this->input->post('txt_detail_ur');
			$data['approved_by'] = $this->session->userdata('user_id');
			
			$this->load->model('tag_model');
			$this->tag_model->update_tag($data,$id);
			redirect('/admin/tag/');
		endif;
		   
    }
    
    function delete_tag($tag_id){
	
		$this->load->model('tag_model');
	
		if( $this->tag_model->get_tag_by_id($tag_id) == FALSE ):
			$list['error_msg'] = "No record found for the provided Tag ID. Use the menu if you have access.";
			$list['main_content'] = "message_view";
			$this->load->view('admin/includes/template', $list);
			return;
		endif;
	
		$this->load->model('tag_model');
		$this->tag_model->delete_tag($tag_id);
		redirect('/admin/tag/');
    }
    
    function users(){
		
		$this->load->helper('form');
		$this->load->model('user_model');
		
		if( $this->input->is_ajax_request() ):
				
			$id = $this->input->post('user_id');
			echo $id;
			$data['is_active'] = $this->input->post('status');
		
			$this->load->model('user_model');
			$this->user_model->block_user($data,$id);
			
			return;				
		endif;
		
		$list['users'] = $this->user_model->get_all_users();

		foreach($list['users'] as $user):
			$user->admin_role = $this->user_model->get_user_role_by_userid('administrator',$user->user_id);
		endforeach;
		$list['main_content'] = '/admin/admin_users_view';
		$this->load->view('admin/includes/template',$list);
    }
    
    function hadith($action='',$id=''){
	
		$this->load->helper('form');
	
		require_once('hadith.php');
		$hadith = new hadith();
		
		if($action=='update'):
			$hadith->update($id);
			
		elseif($action=='add'):
			$hadith->add();
		elseif($action=='delete'):
			$hadith->delete($id);
		else:
		  $hadith->display();
		endif;
  }
  
  function chapter($action='',$id=''){
	
		$this->load->helper('form');
		require_once('chapter.php');
		$chapter = new chapter();
		
		if($action=='update'):
			$chapter->update($id);
		elseif($action=='add'):
			$chapter->add();
		elseif($action=='delete'):
			$chapter->delete();
		else:
		  $chapter->display();
		endif;
	}
	
  
  
  function hadith_book($action='',$id=''){
    
		
		$this->load->helper('form');
	
		require_once('hadith_book.php');
		$hadith_book = new hadith_book();
		  
		if($action == 'add'):
			$hadith_book->add();
		elseif($action == 'update'):
			$hadith_book->update($id); 
		elseif($action == 'delete'):
			$hadith_book->delete($id);
		else:
			$hadith_book->display(); 
		endif;
		
	}
	
	function hadith_in_book( $hadith_id='', $hadith_in_book_id='' ){
		
		$this->load->helper('form');
	
		require_once('hadith.php');
		$hadith = new hadith();
		  
		$hadith->hadith_in_book( $hadith_id, $hadith_in_book_id ); 
		
	}
  
	function authenticity($action='',$id=''){

		
		$this->load->helper('form');  
		require_once('authenticity.php');
		$authenticity = new authenticity();
		
		if($action=='update'):  
			$authenticity->update($id);	
		elseif($action=='delete'):
			$authenticity->delete($id);	
		elseif($action=='add'):
			$authenticity->add();
		else:
			$authenticity->display();
		endif;
	}
  
	function role($action='',$id=''){
    
		$this->load->helper('form');		
		require_once('role.php');
		$role = new role();
		if($action=='update'):
			$role->update($id);
		elseif($action=='add'):
			$role->add();
		elseif($action=='delete'):
			$role->delete($id);	
		else:
			$role->display();
		endif;
	}
  
	function book( $action='',$id='' ){
    
		require_once('book.php');
		$book =  new book();
		if( $action == 'update' ):
			$book->view($id);
		else:
			$book->view();	
		endif;
	}
     
   function user_role($action='',$id=''){
	
		$this->load->helper('form');
		require_once('user.php');
		$user = new user();
		if($action=='update'):
			$user->update($id);

		else:
			$user->display();
		endif;
	}

    function report($action='',$id=''){
    
		$this->load->helper('form');
	
		require_once('report.php');
		$report = new report();
		if($action=='update'):
			$report->update($id);
		elseif($action=='delete'):
			$report->delete($id);
		else:
			$report->display();
		endif;
	}
  
  
	function user_activities(){
		$this->load->model('user_model');
		//if the user is already signed-in then redirect him/her to the home()
		$user_id = $this->session->userdata('user_id');
		$role = $this->session->userdata('role_title');
		
		$list['user_activities'] = $this->user_model->get_user_activities();
		$list['main_content'] = '/admin/user_activities_view';
		
		
		$this->load->view('admin/includes/template',$list);
	}
  
  
	function subscriptions(){
    
		$this->load->model('hadith_model');
		$this->load->model('book_model');
		$this->load->model('chapter_model');
	
		//get ajax request for tags
		if( $this->input->is_ajax_request() ):
			$data = $this->input->post('data');
			//if chapter dropdown is changed
			if( $data['task'] == 'chapter' ):
				//get ahadith by selected values
				$ahadith = $this->hadith_model->get_all_hadith_in_book( $data['hadith_book_id'], $data['book_id'], $data['chapter_id'] );
				
				//html for options
				$ahadith_html='';
				if( !empty($ahadith) ):
					foreach( $ahadith as $hadith ):
						$ahadith_html .= '<option value="'.$hadith->hadith_id.'">'.substr( $hadith->hadith_id, 0 ,20).'&hellip;</option>';
					endforeach;			
				endif;
				
				$data = new stdClass();
				$data->ahadith_list = $ahadith_html;
			//if book dropdown is changed
			elseif( $data['task'] == 'book' ):
				//get chapters by selected values
				$chapters = $this->chapter_model->get_all_chapters($data['hadith_book_id'], $data['book_id'] );
				//get ahadith by selected values and first value of chapter
				$ahadith = $this->hadith_model->get_all_hadith_in_book( $data['hadith_book_id'], $data['book_id'], $chapters[0]->chapter_id );
				
				$chapter_html='';
				
				//html for options
				if(!empty( $chapters )):
				
					foreach( $chapters as $chapter ):
						$chapter_html .= '<option value="'.$chapter->chapter_id.'">'.substr($chapter->chapter_title_en,0,20).'&hellip;</option>';
					endforeach;
				endif;
				
				$ahadith_html='';
				
				if(!empty( $ahadith )):
				
					foreach( $ahadith as $hadith ):
						$ahadith_html .= '<option value="'.$hadith->hadith_id.'">'.substr( $hadith->hadith_id, 0 ,20).'&hellip;</option>';
					endforeach;			
				endif;
				
				$data = new stdClass();
				$data->chapter_list = $chapter_html;
				$data->ahadith_list = $ahadith_html;
			//if hadith dropdown is changed
			elseif( $data['task'] == 'hadith-book' ):
				//get respected books for hadith book id
				$books = $this->book_model->get_all_books( $data['hadith_book_id'] );
				//get respected chapters for selected values
				$chapters = $this->chapter_model->get_all_chapters($data['hadith_book_id'], $books[0]->book_id );
				//get ahadith by selected value of hadith_book_id and first values of book and chapter id
				$ahadith = $this->hadith_model->get_all_hadith_in_book( $data['hadith_book_id'], $books[0]->book_id, $chapters[0]->chapter_id );
				
				//html for options
				$book_html='';
				foreach( $books as $book ):
					$book_html .= '<option value="'.$book->book_id.'">'.$book->book_title_en.'</option>';
				endforeach;
				
				$chapter_html='';
				
				if(!empty( $chapters )):
				
					foreach( $chapters as $chapter ):
						$chapter_html .= '<option value="'.$chapter->chapter_id.'">'.substr($chapter->chapter_title_en,0,20).'&hellip;</option>';
					endforeach;
				endif;
				
				$ahadith_html='';
				
				if(!empty( $ahadith )):
					foreach( $ahadith as $hadith ):
						$ahadith_html .= '<option value="'.$hadith->hadith_id.'">'.substr( $hadith->hadith_id, 0 ,20).'&hellip;</option>';
					endforeach;
				endif;
				
				$data = new stdClass();
				$data->book_list = $book_html;
				$data->chapter_list = $chapter_html;
				$data->ahadith_list = $ahadith_html;
				
			//when hadith-preview is clicked
			elseif( $data['task'] == 'hadith-preview' ):
				//get selected hadith 
				$hadith = $this->hadith_model->get_hadith_by_id($data['hadith_id']);
				
				//html for hadith 
				$hadith_html = '';
				
				if( !empty( $hadith ) ):
					$hadith_html .= '<p lang="AR">' .$hadith->hadith_plain_ar.'</p>';
					$hadith_html .= '<p lang="EN">'.$hadith->hadith_plain_en.'</p>';
					$hadith_html .= '<p lang="UR">'.$hadith->hadith_plain_ur.'</p>';
				endif;
				
				$data = new stdClass();
				$data->hadith_html = $hadith_html;
			//when send mail is clicked
			elseif( $data['task'] == 'send-mail' ):
				
				$hadith_id = $data['hadith_id'];
				
				//get selected hadith
				$hadith = $this->hadith_model->get_hadith_by_id($hadith_id);
				
				//array for selected users
				$arr_email = $data['arr_user_ids'];
				
				//send email
				date_default_timezone_set('GMT');
				$this->load->library('email');
				
				$this->email->from('trust.manager@mishkat.pk');
				$this->email->to($arr_email); 	
				$this->email->subject('Daily Hadith Alert');
				$this->email->message('Hadith No. '. $hadith_id . ' (Arabic):<br/> <br/> '. $hadith->hadith_plain_ar . ' <br/><br/><br/>' . ' (English): <br/><br/>  '. $hadith->hadith_plain_en . ' <br/><br/><br/>' . ' (Urdu): <br/><br/>  '. $hadith->hadith_plain_ur);	    
				
				$message ='';
				
				if( $this->email->send() ):
					$message['type'] = 'success';
					$message['body'] = 'Email has been sent successfully';
				else:
					$message['type'] = 'danger';
					$message['body'] = 'Error occured while sending email';
				endif;
				
				$data = new stdClass();
				$data->message = $message;
				
			endif;
			
			echo json_encode( $data );
			
			return;
			
		endif;
	
		$this->load->helper('form');
		//if the user is already signed-in then redirect him/her to the home()
		$user_id = $this->session->userdata('user_id');
		$role = $this->session->userdata('role_title');
		if( isset($user_id) && !empty($user_id) && !empty($role) ):
	    
			$this->load->model('user_model');
			
			$users = $this->user_model->get_all_users();
			//get users whose are subscribed
			//check from user_settings
			for( $i=0; $i<count($users);$i++ ):
				if( empty($this->user_model->get_user_setting_by_id('email_subscription',$users[$i]->user_id)) OR $this->user_model->get_user_setting_by_id('email_subscription',$users[$i]->user_id) == 'false' ):
					unset($users[$i]);
				endif;
			endfor;
		
			$list['users'] = $users;
			
			$this->load->model('hadith_book_model');
			
			$list['hadith_books'] = $this->hadith_book_model->get_hadith_books();
			//get books from first hadith_book
			$list['books'] = $this->book_model->get_all_books( $list['hadith_books'][0]->hadith_book_id );
			//get books from first values
			$list['chapters'] = $this->chapter_model->get_all_chapters($list['hadith_books'][0]->hadith_book_id, $list['books'][0]->book_id);
			//get ahadith from first values
			$list['ahadith'] = $this->hadith_model->get_all_hadith_in_book( $list['hadith_books'][0]->hadith_book_id, $list['books'][0]->book_id, $list['chapters'][0]->chapter_id );
			
			$list['main_content'] = '/admin/subscriptions_view';
			$this->load->view('admin/includes/template',$list);
			
		else:
			redirect('user/signin');
		endif;
	}
}