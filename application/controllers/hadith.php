<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hadith extends CI_Controller {

  function _remap( $method, $param ) {
			
    if( $method == 'display' ):
      $this->display();
      
    elseif( $method == 'add' ):
      $this->add();
      
    elseif( $method == 'update' ):
    
      //set default for parameter hadith_code
	  if( !isset( $param[0] ) ):
		$param[0] = '';
	  endif;
      
      $this->update( $param[0] );
    elseif( $method == 'delete' ):
      
      //set default for parameter hadith_code
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

  /*Method to display all ahadith
   *
   *@return none
   *
   */
  
  public function display(){
    $this->load->helper('form');
    $this->load->model('hadith_model');
    
    $list['ahadith'] = $this->hadith_model->get_all_hadith();
    $list['main_content'] = 'admin/hadith_view';
    
    $this->load->view('admin/includes/template',$list);

  }
  
  /*Method to add hadith
   *
   *@return none
   *
  */

  public function add(){
    $this->load->helper('form');
    $this->load->model('hadith_model');
    
    $this->load->library('form_validation');
    $this->form_validation->set_rules('txt_plain_ar', 'Plain Arabic', 'trim|required');
    $this->form_validation->set_rules('txt_plain_en', 'Plain English', 'trim|required');
    $this->form_validation->set_rules('txt_plain_ur', 'Plain Urdu', 'trim|required');
    
    $this->form_validation->set_rules('txt_marked_ar', 'Marked Arabic', 'trim|required');
    $this->form_validation->set_rules('txt_marked_en', 'Marked English', 'trim|required');
    $this->form_validation->set_rules('txt_marked_ur', 'Marked Urdu', 'trim|required');
    $this->form_validation->set_rules('txt_raw_ar', 'Raw Arabic', 'trim|required');
    $this->form_validation->set_rules('ddl_authenticity_id', 'Authenticity ID', 'trim|required');
    
    
    $list['authenticity'] = $this->hadith_model->get_all_authenticity();
    $list['main_content'] = 'admin/add_hadith_view';
    
    if ($this->form_validation->run() == FALSE):
       $this->load->view('admin/includes/template',$list);
    
    else: 
    
      $data['hadith_plain_ar'] = $this->input->post('txt_plain_ar');
      $data['hadith_plain_en'] = $this->input->post('txt_plain_en');
      $data['hadith_plain_ur'] = $this->input->post('txt_plain_ur');
      $data['hadith_marked_ar'] = $this->input->post('txt_marked_ar');
      $data['hadith_marked_en'] = $this->input->post('txt_marked_en');
      $data['hadith_marked_ur'] = $this->input->post('txt_marked_ur');
      $data['hadith_raw_ar'] = $this->input->post('txt_raw_ar');
      $data['authenticity_id'] = $this->input->post('ddl_authenticity_id');
      
      $this->hadith_model->insert_hadith($data);
      redirect('admin/hadith');
    
    endif;

  }

  /*Method to update hadith
   *
   *@param string $hadith_code Id of hadith
   *
   *@return none
   */
  public function update($hadith_id){

    $this->load->model('hadith_model');
    //check for valid hadith_id
    if( $this->hadith_model->get_hadith_by_id($hadith_id) == FALSE ):
      $list['error_msg'] = "No record found for the provided Hadith ID. Use the menu if you have access.";
      $list['main_content'] = "message_view";
      $this->load->view('admin/includes/template', $list);
      return;
    endif;
    
    $this->load->helper('form');
    
    $this->load->library('form_validation');
    $this->form_validation->set_rules('txt_plain_ar', 'Plain Arabic', 'trim|required');
    $this->form_validation->set_rules('txt_plain_en', 'Plain English', 'trim|required');
    $this->form_validation->set_rules('txt_plain_ur', 'Plain Urdu', 'trim|required');
    $this->form_validation->set_rules('txt_marked_ar', 'Marked Arabic', 'trim|required');
    $this->form_validation->set_rules('txt_marked_en', 'Marked English', 'trim|required');
    $this->form_validation->set_rules('txt_marked_ur', 'Marked Urdu', 'trim|required');
    $this->form_validation->set_rules('txt_raw_ar', 'Raw Arabic', 'trim|required');
    $this->form_validation->set_rules('ddl_authenticity_id', 'Authenticity ID', 'required');
  
    $list['hadith_id'] = $hadith_id;
    $list['hadith'] =  $this->hadith_model->get_hadith_by_id($hadith_id);
    $list['authenticity'] = $this->hadith_model->get_all_authenticity();
    $list['main_content']= 'admin/update_hadith_view';
    if ($this->form_validation->run() == FALSE):
      $this->load->view('admin/includes/template',$list);

    else:
    
      $hadith['hadith_plain_ar'] = $this->input->post('txt_plain_ar');
      $hadith['hadith_plain_en'] = $this->input->post('txt_plain_en');
      $hadith['hadith_plain_ur'] = $this->input->post('txt_plain_ur');
      $hadith['hadith_marked_ar'] = $this->input->post('txt_marked_ar');
      $hadith['hadith_marked_en'] = $this->input->post('txt_marked_en');
      $hadith['hadith_marked_ur'] = $this->input->post('txt_marked_ur');
      $hadith['hadith_raw_ar'] = $this->input->post('txt_raw_ar');
      $hadith['authenticity_id'] = $this->input->post('ddl_authenticity_id');

      $this->load->model('hadith_model');
      $this->hadith_model->update_hadith($hadith_id,$hadith);

      redirect('admin/hadith');
    endif;
  }

  /*Method to delete hadith
   *
   *@param string $hadith_code Id of hadith
   *
   *@return none
   *
   */
  public function delete( $hadith_id ){

    $this->load->model('hadith_model');
    //check for valid hadith_id
    if( $this->hadith_model->get_hadith_by_id($hadith_id) == FALSE ):
      $list['error_msg'] = "No record found for the provided Hadith ID. Use the menu if you have access.";
      $list['main_content'] = "message_view";
      $this->load->view('admin/includes/template', $list);
      return;
    endif;
  
    $this->hadith_model->delete_hadith( $hadith_id );
    redirect('admin/hadith');
  }

}
