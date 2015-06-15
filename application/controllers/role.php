<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Role extends CI_COntroller {
  
  function _remap( $method, $param ) {
			
    if( $method == 'display' ):
      $this->display();
      
    elseif( $method == 'add' ):
      $this->add();
      
    elseif( $method == 'update' ):
    
      //set default for parameter chapter_id
	  if( !isset( $param[0] ) ):
		$param[0] = '';
	  endif;
      
      $this->update( $param[0] );
    elseif( $method == 'delete' ):
      
      //set default for parameter chapter_id
	  if( !isset( $param[0] ) ):
		$param[0] = '';
	  endif;
      
      $this->delete( $param[0] );
        
    //for all other method names, display an error message
    else:
        $list['error_msg'] = "The Page you are trying to view does not exists. Use the menu if you have access.";
        $list['main_content'] = "message_view";
        $this->load->view('includes/template', $list);
    endif;
  }

  /*Method to display chapter
   *
   *return none
   *
   */
  
  public function display(){
	
	  //limit view role only to authorized
	 if( !$this->user_roles->is_authorized( array('admin_role_view') ) ):
        $list['error_msg'] = "You are not authorized to view Role.";
        $list['main_content'] = "message_view";
        $this->load->view('includes/template', $list);
        return;
    endif;
    
    $this->load->helper('form');
    $this->load->model('role_model');
    $list['roles'] = $this->role_model->get_all_roles();
    $list['main_content'] = 'admin/role_view';
    
    $this->load->view('admin/includes/template',$list);
  }

  /*Method to add role
   *
   *@return none
   */
  
  function add(){
    
	  //limit add role only to authorized
	 if( !$this->user_roles->is_authorized( array('admin_role_add') ) ):
        $list['error_msg'] = "You are not authorized to Add Role.";
        $list['main_content'] = "message_view";
        $this->load->view('includes/template', $list);
        return;
    endif;
	
    $this->load->helper('form');
    
    $this->load->library('form_validation');
    $role_title="";
    $this->form_validation->set_rules('txt_role_title','Role Title','trim|required|unique_id['.$role_title.',Role Title]');
    $this->form_validation->set_rules('txt_description','Role Description','trim|required');
    $this->form_validation->set_rules('ddl_dependent_roles[]','Dependent Roles','');
    
	$this->load->model('role_model');
	$role_title = '';
	$list['roles'] = $this->role_model->get_potential_roles($role_title);
	
    $list['main_content'] = 'admin/add_role_view';
    if ($this->form_validation->run() == FALSE):
      $this->load->view('admin/includes/template',$list);
    
    else:
    //if( !empty($this->input->post('mysubmit'))):
      $data['role_title'] = $this->input->post('txt_role_title');
      $data['description'] = $this->input->post('txt_description');

	  //role_order should be the last one
      $data['role_order'] = $this->role_model->generate_role_order();
	  
	  $this->role_model->insert_role($data);
	  
	  //user selected options of dependent array
      $arr = $this->input->post('ddl_dependent_roles');
  
	  //add the dependent roles also
	  for( $i = 0; $i < count($arr) ; $i++ ):
	  
		  $role_dependecy = array(
								  'role_title' => $this->input->post('txt_role_title'),
								  'dependent_role' => $arr[$i]
							  );
		  
		  $this->role_model->add_role_dependency($role_dependecy);
	  endfor;
  
      redirect('admin/role');
      
  
    endif;
    
    }

  /*Method to update role
   *
   *@param string $role_title of role
   *
   *@return none
   *
   */
  
  function update($role_title){
	
	
	  //limit update role only to authorized
	 if( !$this->user_roles->is_authorized( array('admin_role_edit') ) ):
        $list['error_msg'] = "You are not authorized to Edit Role.";
        $list['main_content'] = "message_view";
        $this->load->view('includes/template', $list);
        return;
    endif;
    
    $this->load->model('role_model');
    //if role-title is empty or invalid
	if( $this->role_model->get_role_by_title($role_title) === FALSE ):
      $list['error_msg'] = "No record found for the provided Role details. Use the menu if you have access.";
      $list['main_content'] = "message_view";
      $this->load->view('admin/includes/template', $list);
      return;
	endif;
	
    $this->load->helper('form');
	$this->load->library('form_validation');
    $this->form_validation->set_rules('txt_role_title','Role Title','required');
    $this->form_validation->set_rules('txt_description','Role Description','required');
    $this->form_validation->set_rules('ddl_dependent_roles[]','Dependent Roles','');
    
    $list['roles'] = $this->role_model->get_potential_roles($role_title);
	$list['dependency'] = $dependent_role_titles = $this->role_model->get_role_dependencies_by_title( $role_title, 'dependent_role' );
	$list['role_title'] = $role_title;
    $list['data'] =  $this->role_model->get_role_by_title($role_title);
    $list['main_content'] = 'admin/update_role_view';
    if ($this->form_validation->run() == FALSE):
    $this->load->view('admin/includes/template',$list);
    
    else:
    //if( !empty($this->input->post('mysubmit'))):
      $data['description'] = $this->input->post('txt_description');
      $data['role_order'] = $this->input->post('txt_role_order');

      $this->load->model('role_model');
      $this->role_model->update_role($role_title,$data);

	  //user selected options of dependent array
      $arr = $this->input->post('ddl_dependent_roles');
	  
	  //if there is no record in DB, and user selects option then add them all
	  if( empty($dependent_role_titles) AND (count($arr) > 0) ):
		  for( $i = 0; $i < count($arr) ; $i++ ):
			  
			  $role_dependecy = array(
									  'role_title' => $this->input->post('txt_role_title'),
									  'dependent_role' => $arr[$i]
								  );
			  
			  $this->role_model->add_role_dependency($role_dependecy);
		  endfor;
		  
	  //if user does not select any option, delete them all
	  elseif( $arr === FALSE ):
		  
		  $role_dependecy = array(
								  'role_title' => $this->input->post('txt_role_title')
							  );
		  
		  $this->role_model->delete_role_dependency($role_dependecy);
		  
	  //if both arrays are not empty find the difference
	  else:
		  $diff_arr = array_merge(array_diff($arr, $dependent_role_titles), array_diff($dependent_role_titles, $arr));
		  
		  //diff_arr returns difference
		  for( $i = 0; $i < count($diff_arr); $i++ ):
			  
			  $role_dependecy = array(
									  'role_title' => $this->input->post('txt_role_title'),
									  'dependent_role' => $diff_arr[$i]
								  );
			  
			  //if diff arr item is only found in DB, delete it
			  if(in_array($diff_arr[$i], $dependent_role_titles)):
				  
				  $this->role_model->delete_role_dependency($role_dependecy);
				  
			  //if diff arr item is only found in user array, add it
			  elseif(in_array($diff_arr[$i], $arr)):
				  
				  $this->role_model->add_role_dependency($role_dependecy);
				  
			  endif;
		  endfor;
	  endif;
	  
      redirect('admin/role');
    

    endif;
  }

  /*Method to delete role
   *
   *@param string $role_title of role
   *
   *@return none
   */
  
  function delete( $role_title){
  
	$this->load->model('role_model');
    //if role-title is empty or invalid
	if( $this->role_model->get_role_by_title($role_title) === FALSE ):
      $list['error_msg'] = "No record found for the provided Role details. Use the menu if you have access.";
      $list['main_content'] = "message_view";
      $this->load->view('admin/includes/template', $list);
      return;
	endif;

    $this->load->model('role_model');
    $this->role_model->delete_role( $role_title );
  
    redirect('admin/role');
  }

}
