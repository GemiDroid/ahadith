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
  
  public function add(){
    
    $this->load->helper('form');
    
    $this->load->library('form_validation');
    
    $this->form_validation->set_rules('txt_role_title','Role Title','required');
    $this->form_validation->set_rules('txt_description','Role Description','required');
    $this->form_validation->set_rules('txt_role_order','Role Order','required');
    
    $list['main_content'] = 'admin/add_role_view';
    if ($this->form_validation->run() == FALSE):
      $this->load->view('admin/includes/template',$list);
    
    else:
    //if( !empty($this->input->post('mysubmit'))):
      $data['role_title'] = $this->input->post('txt_role_title');
      $data['description'] = $this->input->post('txt_description');
      $data['role_order'] = $this->input->post('txt_role_order');
  
      $this->load->model('role_model');
      $this->role_model->insert_role($data);
  
      redirect('admin/role');
      
  
    endif;
    
    }

  /*Method to update role
   *
   *@param string $role_title ID of role
   *
   *@return none
   *
   */
  
  public function update($role_title){
    
    $this->load->helper('form');
    $this->load->model('role_model');
    
    $this->load->library('form_validation');
    $this->form_validation->set_rules('txt_description', 'Role Description', 'required');
    $this->form_validation->set_rules('txt_role_order', 'Role Order', 'required');
    
     $list['role_title'] = $role_title;
    $list['role'] =  $this->role_model->get_role_by_title($role_title);
    $list['main_content'] = 'admin/update_role_view';
    if ($this->form_validation->run() == FALSE):
    $this->load->view('admin/includes/template',$list);
    
    else:
    //if( !empty($this->input->post('mysubmit'))):
      $data['description'] = $this->input->post('txt_description');
      $data['role_order'] = $this->input->post('txt_role_order');

      $this->load->model('role_model');
      $this->role_model->update_role($role_title,$data);

      redirect('admin/role');
    

    endif;
  }

  /*Method to delete role
   *
   *@param string $role_title ID of role
   *
   *@return none
   */
  
  public function delete( $role_title){

    $this->load->helper('url');
    $this->load->model('role_model');
    $this->role_model->delete_role( $role_title );
  
    redirect('admin/role');
  }

}
