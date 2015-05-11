<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
  
    function _remap( $method, $param ) {
        if( $method == 'index' ):
                $this->index();
        elseif( $method == 'tag' ):
      
      //set default for parameter tag_id
	  if( !isset( $param[0] ) ):
		$param[0] = '';
	  endif;
      
      $this->tag( $param[0] );
       elseif( $method == 'editor' ):
        if( !isset( $param[0] ) ):
		$param[0] = '';
	  endif;
	
      
      
      $this->editor($param[0]);
      
        elseif( $method == 'tags' ):
                $this->tags();
	 
	 
	  elseif( $method == 'add' ):
                $this->add();
	elseif( $method == 'report' ):
      
      //set default for parameter user_id
	  if( !isset( $param[0] ) ):
		$param[0] = '';
	  endif;
	  
	  if( !isset( $param[1] ) ):
		$param[1] = '';
	  endif;
	  
	 $this->report( $param[0],$param[1] );
		
		
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
	
        elseif( $method == 'users' ):
                $this->users();
		
		 elseif( $method == 'user-activities' ):
                $this->user_activities();
    
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
      elseif( $method == 'delete_tag' ):
      
      //set default for parameter tag_id
	  if( !isset( $param[0] ) ):
		$param[0] = '';
	  endif;
	  
      $this->delete_tag( $param[0] );
      
      
      elseif( $method == 'approve_tag' ):
      
      //set default for parameter tag_id
	  if( !isset( $param[0] ) ):
		$param[0] = '';
	  endif;
	  
	 $this->approve_tag( $param[0] );
        //for all other method names, display an error message
        else:
            $list['error_msg'] = "The Page you are trying to view does not exists. Use the menu if you have access.";
            $list['main_content'] = "message_view";
            $this->load->view('includes/template', $list);
        endif;
    } 
  /* Display all columns of authenticity table
  *
  * @return none
  */
    public function index(){
	
	$this->load->model('user_model');
	//if the user is already signed-in then redirect him/her to the home()
	$user_id = $this->session->userdata('user_id');
	$role = $this->session->userdata('role_title');
	if( isset($user_id) && !empty($user_id) && !empty($role) ):
	
        $list['main_content'] = '/admin/admin_view';
	$this->load->view('admin/includes/template',$list);
	
	else:
	    redirect('user/signin');
	
	endif;
        
    }
    
    public function tags(){
	
	$this->load->model('user_model');
	//if the user is already signed-in then redirect him/her to the home()
	$user_id = $this->session->userdata('user_id');
	$role = $this->session->userdata('role_title');
	if( isset($user_id) && !empty($user_id) && !empty($role) ):
        
        $this->load->model('tag_model');
        $list['tags'] = $this->tag_model->get_tags();
	 $list['main_content'] = '/admin/admin_tags_view';
	$this->load->view('admin/includes/template',$list);
        //$this->load->view('admin/admin_tags_view',$list);
	
	else:
	    redirect('user/signin');
	
	endif;
    }
    
    
    public function tag($id){
	
	$this->load->model('user_model');
	//if the user is already signed-in then redirect him/her to the home()
	$user_id = $this->session->userdata('user_id');
	$role = $this->session->userdata('role_title');
	if( isset($user_id) && !empty($user_id) && !empty($role)):
	
        $this->load->helper('form');
	$this->load->library('form_validation');
        $this->load->model('tag_model');
        $list['tag'] = $this->tag_model->get_tag_by_id($id);
	 $list['main_content'] = '/admin/edit_tag_view';
	$this->load->view('admin/includes/template',$list);
       // $this->load->view('admin/edit_tag_view',$list);
       
       
       else:
	    redirect('user/signin');
       endif;
    }
    
    
    
    
    public function users(){
	$this->load->model('user_model');
	//if the user is already signed-in then redirect him/her to the home()
	$user_id = $this->session->userdata('user_id');
	$role = $this->session->userdata('role_title');
	if( isset($user_id) && !empty($user_id) && !empty($role) ):
	
        $this->load->model('user_model');
	
        $list['users'] = $this->user_model->get_all_users();
	
	
	
//$list['role'] = $this->user_model->get_all_user_role();
	
	foreach($list['users'] as $user):
	    $user->admin_role = $this->user_model->get_user_role_by_userid('administrator',$user->user_id);
	endforeach;
	$list['main_content'] = '/admin/admin_users_view';
	$this->load->view('admin/includes/template',$list);
       // $this->load->view('admin/admin_users_view',$list);
       
       else:
	    redirect('user/signin');
       endif;
       
    }
    
     public function user($id){
	
	$this->load->model('user_model');
	//if the user is already signed-in then redirect him/her to the home()
	$user_id = $this->session->userdata('user_id');
	$role = $this->session->userdata('role_title');
	if( isset($user_id) && !empty($user_id) && !empty($role) ):
	
	$this->load->helper('form');
	$this->load->library('form_validation');
	

	$this->load->model('user_model');
	
	$this->form_validation->set_rules('toggle-one', 'Block', 'required');

	$list['user'] = $this->user_model->get_user($id);
	$list['role'] = $this->user_model->get_all_role();
	//if ($this->form_validation->run() == FALSE):
	$list['main_content'] = '/admin/manage_user_view';
	$this->load->view('admin/includes/template',$list);
	  //$this->load->view('/admin/manage_user_view',$list);

	//else:
	    
	    if( !empty($this->input->post('btn_save'))):
		$data['is_active'] = $this->input->post('rad_user_status');
		$data1['user_id'] = $id;
		$data1['role_title'] = $this->input->post('ddl_user_role');
		
		    
		
		$this->load->model('user_model');
		$this->user_model->block_user($data,$id);
		if(!empty($data1['role_title'])):
		
		$this->user_model->insert_role($data1);
		
		endif;
		redirect('/admin/users');
	    endif;
		
	//endif;
	
	else:
	    redirect('user/signin');
    
	endif;
    }
    
      public function delete_tag($tag_id){
	
	$this->load->model('user_model');
	//if the user is already signed-in then redirect him/her to the home()
	$user_id = $this->session->userdata('user_id');
	$role = $this->session->userdata('role_title');
	if( isset($user_id) && !empty($user_id) && !empty($role) ):
        
        $this->load->model('tag_model');
	$this->tag_model->delete_tag($tag_id);
	redirect('/admin/tags/');
	
	else:
	    redirect('user/signin');
	endif;
    }
    
    public function approve_tag($tag_id){
	
	$this->load->model('user_model');
	//if the user is already signed-in then redirect him/her to the home()
	$user_id = $this->session->userdata('user_id');
	$role = $this->session->userdata('role_title');
	if( isset($user_id) && !empty($user_id) && !empty($role) ):
	
	$this->load->helper('form');
	$this->load->library('form_validation');
	$this->form_validation->set_rules('txt_tag_title_en', 'Tag Title English', 'required');
	
	$list['main_content'] = '/admin/edit_tag_view';
	if ($this->form_validation->run() == FALSE):
	
	$this->load->view('admin/includes/template',$list);
		  //$this->load->view('admin/edit_tag_view');
	else:
	    if( !empty($this->input->post('btn_approve_tag'))):
		$data['tag_title_ar'] = $this->input->post('txt_tag_title_ar');
		$data['tag_title_en'] = $this->input->post('txt_tag_title_en');
		$data['tag_title_ur'] = $this->input->post('txt_tag_title_ur');
		$data['tag_detail_ar'] = $this->input->post('txt_tag_detail_ar');
		$data['tag_detail_en'] = $this->input->post('txt_tag_detail_en');
		$data['tag_detail_ur'] = $this->input->post('txt_tag_detail_ur');
		
		$this->load->model('tag_model');
		$this->tag_model->update_tag($data,$tag_id);
		redirect('/admin/tags/');
	    endif;
	endif;
	
	
	else:
	    redirect('user/signin');
	
	endif;
	
    }
  
  
    public function hadith($action='',$id=''){
	
	$this->load->model('user_model');
	//if the user is already signed-in then redirect him/her to the home()
	$user_id = $this->session->userdata('user_id');
	$role = $this->session->userdata('role_title');
	if( isset($user_id) && !empty($user_id) && !empty($role) ):

    $this->load->helper('form');
    
    require_once('hadith.php');
    $hadith = new hadith();
    if($action=='update'):
    
      $hadith->update($id);
      
    elseif($action=='search'):
	if(!empty('btn_search')):
		$hadith_id = $this->input->post('search_hadith_by_id');
		$hadith->update($hadith_id);
	endif;
	    
    elseif($action=='add'):
	$hadith->add();
	
	
    else:
      $hadith->display();
    endif;
    
    
	else:
	    redirect('user/signin');
	
	endif;
  
  }
  
  public function chapter($action='',$id=''){
    
    $this->load->model('user_model');
  //if the user is already signed-in then redirect him/her to the home()
	$user_id = $this->session->userdata('user_id');
	$role = $this->session->userdata('role_title');
	if( isset($user_id) && !empty($user_id) && !empty($role) ):

    $this->load->helper('form');
    
    require_once('chapter.php');
    $chapter = new chapter();
    
    if($action=='update'):
    
      $chapter->update($id);

 elseif($action=='search'):
	if(!empty('btn_search')):
		$chapter_id = $this->input->post('ddl_chapter_list');
		$chapter->update($chapter_id);
	endif;          
    elseif($action=='add'):
	$chapter->add();
	
	
    else:
      $chapter->display();
    
    endif;
    
   
	else:
	    redirect('user/signin');
	
	endif;
	

  }
  
  
  public function hadith_book($action='',$id=''){
    
    $this->load->model('user_model');
  //if the user is already signed-in then redirect him/her to the home()
	$user_id = $this->session->userdata('user_id');
	$role = $this->session->userdata('role_title');
	if( isset($user_id) && !empty($user_id) && !empty($role) ):

    $this->load->helper('form');
    
    require_once('hadith_book.php');
    $hadith_book = new hadith_book();
   
          
   if($action=='add'):
	$hadith_book->add();
    elseif($action=='update'):
	$hadith_book->update($id);
	
	 elseif($action=='search'):
	if(!empty('btn_search')):
		$hadith_book_id = $this->input->post('ddl_hadith_book_list');
		$hadith_book->update($hadith_book_id);
		
	    endif;
	elseif($action=='delete'):
	$hadith_book->delete($id);
    else:
      $hadith_book->display();
    
    endif;
    
   
	else:
	    redirect('user/signin');
	
	endif;
	

  }
  
  public function authenticity($action='',$id=''){

  $this->load->model('user_model');
  //if the user is already signed-in then redirect him/her to the home()
	$user_id = $this->session->userdata('user_id');
	$role = $this->session->userdata('role_title');
	if( isset($user_id) && !empty($user_id) && !empty($role) ):
  
    $this->load->helper('form');
    
    require_once('authenticity.php');
    $authenticity = new authenticity();
    if($action=='update'):
    
      $authenticity->update($id);
      
       elseif($action=='search'):
	if(!empty('btn_search')):
		$authenticity_id = $this->input->post('ddl_authenticity_list');
		$authenticity->update($authenticity_id);
		
	    endif;
          
    elseif($action=='add'):
	$authenticity->add();
	
	
    else:
    $authenticity->display();
    
    endif;
    
    
    else:
	    redirect('user/signin');
	
	endif;

  }
  
  public function role($action='',$id=''){
    
    $this->load->model('user_model');
    //if the user is already signed-in then redirect him/her to the home()
	$user_id = $this->session->userdata('user_id');
	$role = $this->session->userdata('role_title');
	if( isset($user_id) && !empty($user_id) && !empty($role) ):
 

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
   

   
	else:
	    redirect('user/signin');
	
	endif;
  }
  
  public function book(){
    
	$this->load->model('user_model');
    //if the user is already signed-in then redirect him/her to the home()
	$user_id = $this->session->userdata('user_id');
	$role = $this->session->userdata('role_title');
	if( isset($user_id) && !empty($user_id) && !empty($role) ):
	    redirect('book/view');
    
   
	else:
	    redirect('user/signin');
	
	endif;
  }
  
  
  
   public function add(){
  
	$this->load->model('user_model');
  //if the user is already signed-in then redirect him/her to the home()
	$user_id = $this->session->userdata('user_id');
	$role = $this->session->userdata('role_title');
	if( isset($user_id) && !empty($user_id) && !empty($role) ):
  
    $list['main_content'] = 'admin/add_tag_view';
    
    $this->load->helper('form');
    $this->load->view('admin/includes/template',$list);
    
    if( !empty($this->input->post('mysubmit'))):
      $data['tag_title_ar'] = $this->input->post('txt_title_ar');
      $data['tag_title_en'] = $this->input->post('txt_title_en');
      $data['tag_title_ur'] = $this->input->post('txt_title_ur');
      $data['tag_detail_ar'] = $this->input->post('txt_detail_ar');
      $data['tag_detail_en'] = $this->input->post('txt_detail_en');
      $data['tag_detail_ur'] = $this->input->post('txt_detail_ur');
    
      $this->load->model('tag_model');
      $this->tag_model->add_tag($data);
  
      redirect('admin/tags');
      //echo "Successfully inserted Chapter";
    endif;
    
    
	else:
	    redirect('user/signin');
	
	endif;
   
  }

     
   public function user_role($action='',$id=''){
  
	$this->load->model('user_model');
	//if the user is already signed-in then redirect him/her to the home()
	$user_id = $this->session->userdata('user_id');
	$role = $this->session->userdata('role_title');
	if( isset($user_id) && !empty($user_id) && !empty($role) ):
  
   $this->load->helper('form');
    
    require_once('user.php');
    $user = new user();
    if($action=='update'):
    
      $user->update($id);
          
    elseif($action=='add'):
	$user->add();
	
    elseif($action=='delete'):
	$user->delete($id);
	
    else:
    $user->display();
    
    endif;
    
    
    else:
	    redirect('user/signin');
	    
	    endif;
	
   }
   
   
    public function report($action='',$id=''){
    
    $this->load->model('user_model');
    //if the user is already signed-in then redirect him/her to the home()
	$user_id = $this->session->userdata('user_id');
	$role = $this->session->userdata('role_title');
	if( isset($user_id) && !empty($user_id) && !empty($role) ):
 

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

	else:
	    redirect('user/signin');
	
	endif;
  }
  
  
  public function user_activities(){
    $this->load->model('user_model');
	//if the user is already signed-in then redirect him/her to the home()
	$user_id = $this->session->userdata('user_id');
	$role = $this->session->userdata('role_title');
	if( isset($user_id) && !empty($user_id) && !empty($role) ):
	
	$list['user_activities'] = $this->user_model->get_user_activities();
	
	$list['main_content'] = '/admin/user_activities_view';
	
	
	$this->load->view('admin/includes/template',$list);
	
	
	else:
	    redirect('user/signin');
	
	endif;
    
  }
}