<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authenticity extends CI_Controller {
  
  function _remap( $method, $param ) {
			
    if( $method == 'display' ):
      $this->display();
      
    elseif( $method == 'read' ):
      
      //set default for parameter authenticity_id
	  if( !isset( $param[0] ) ):
		$param[0] = '';
	  endif;
      
      $this->read( $param[0] );
      
    elseif( $method == 'add' ):
      $this->add();
      
    elseif( $method == 'update' ):
    
      //set default for parameter authenticity_id
	  if( !isset( $param[0] ) ):
		$param[0] = '';
	  endif;
      
      $this->update( $param[0] );
    elseif( $method == 'delete' ):
      
      //set default for parameter authenticity_id
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
  /* Display all columns of authenticity table
  *
  * @return none
  */
  public function display(){
    $this->load->model('authenticity_model');
    $list['ahadith'] = $this->authenticity_model->get_authenticity();
    $list['main_content'] = 'display_authenticity_view'; 
    $this->load->view('includes/template',$list);

  }
  
  /* Read columns of authenticity table
   *
   *@param string $authenticity_id Id of authenticity
   *
   *@return none
   */

  public function read($authenticity_id){
    $this->load->model('authenticity_model');
    $list['authenticity'] =  $this->authenticity_model->get_authenticity_by_id($authenticity_id);
    $list['main_content'] = 'read_authenticity_view';
    $this->load->view('includes/template',$list);

  }
  
  /* Add a new row of authenticity table
   *
   * @return none
   */

  public function add(){
    $this->load->helper('form');
    $list['main_content'] = 'add_authenticity_view';
    $this->load->view('includes/template',$list);
    
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
  
  /* update a row in authenticity table
   *
   *@param string $autenticity_id Id of authenticity
   *
   *@return none
   */

  public function update($authenticity_id){
    $this->load->model('authenticity_model');
    $list['authenticity_id'] = $authenticity_id;
    $list['authenticity'] =  $this->authenticity_model->get_authenticity_by_id($authenticity_id);
    $this->load->helper('form');
    $list['main_content'] = 'update_authenticity_view';
    $this->load->view('includes/template',$list);
    
    if( !empty($this->input->post('mysubmit'))):
      $authenticity['authenticity_title_ar'] = $this->input->post('txt_title_ar');
      $authenticity['authenticity_title_en'] = $this->input->post('txt_title_en');
      $authenticity['authenticity_title_ur'] = $this->input->post('txt_title_ur');
      $authenticity['authenticity_order'] = $this->input->post('txt_order');

      $this->load->model('authenticity_model');
      $this->authenticity_model->update_authenticity($authenticity_id,$authenticity);
      
      echo "Successfully updated";
    endif;

  }
  
  /* Delete a row in authenticity table
   *
   *@param string $authenticity_id ID of authenticity
   *
   *@return none
   */

  public function delete( $authenticity_id ){

    $this->load->helper('url');
    $this->load->model('authenticity_model');
    $this->authenticity_model->delete_authenticity( $authenticity_id );
    redirect('/authenticity/display/');

    echo "Deleted";
  }

}
