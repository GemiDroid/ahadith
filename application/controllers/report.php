<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_COntroller {
  
  function _remap( $method, $param ) {
			
    if( $method == 'display' ):
      $this->display();
      
   
      
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
    $this->load->model('user_model');
    $list['reports'] = $this->user_model->get_all_reports();
    $list['main_content'] = 'admin/error_report_view';
    
    $this->load->view('admin/includes/template',$list);
  }




  /*Method to update report
   *
   *@param string $error_id ID of error report
   *
   *@return none
   *
   */
  
  public function update($error_id){
    
    $this->load->helper('form');
    $this->load->model('user_model');
     $list['error_id'] = $error_id;
     
     
     $this->load->helper('form');
    $this->load->library('form_validation');

    $this->form_validation->set_rules('txt_error_text', 'Error Text', 'required');
    $this->form_validation->set_rules('txt_user_id', 'User ID', 'required');
    $this->form_validation->set_rules('txt_hadith_id', 'Hadith ID', 'required');
     
    $list['report'] =  $this->user_model->get_report_by_id($error_id);
    $list['main_content'] = 'admin/update_error_report_view';
    if ($this->form_validation->run() == FALSE):
      $this->load->view('admin/includes/template',$list);
    
    else:
    //if( !empty($this->input->post('mysubmit'))):
      $data['error_text'] = $this->input->post('txt_error_text');
      $data['user_id'] = $this->input->post('txt_user_id');
      $data['hadith_id'] = $this->input->post('txt_hadith_id');

      $this->load->model('user_model');
      $this->user_model->update_error_report($error_id,$data);

      redirect('admin/report');
    

    endif;
  }

  /*Method to delete report
   *
   *@param string $error_id ID of error_report
   *
   *@return none
   */
  
  public function delete( $error_id){

    $this->load->helper('url');
    $this->load->model('user_model');
    $this->user_model->delete_error_report( $error_id );
  
    redirect('admin/report');
  }

}
