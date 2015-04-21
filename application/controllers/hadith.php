<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hadith extends CI_Controller {

  function _remap( $method, $param ) {
			
    if( $method == 'display' ):
      $this->display();
      
    elseif( $method == 'read' ):
      
      //set default for parameter hadith_code
	  if( !isset( $param[0] ) ):
		$param[0] = '';
	  endif;
      
      $this->read( $param[0] );
      
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
    $this->load->model('hadith_model');
    
    $list['ahadith'] = $this->hadith_model->get_all_hadith();
    $list['main_content'] = 'hadith_view';
    
    $this->load->view('includes/template',$list);

  }

  /*Method to read hadith
   *
   *@param string $hadith_code Id of hadith
   *
   *@return none
   */
  
  public function read($hadith_id){
    $this->load->model('hadith_model');
    $list['hadith'] =  $this->hadith_model->get_hadith_by_id($hadith_id);
    $list['main_content'] = 'read_hadith_view';

    $this->load->view('includes/template',$list);

  }
  
  /*Method to add hadith
   *
   *@return none
   *
   */

  public function add(){
    $this->load->helper('form');
    $this->load->model('hadith_model');
    $list['authenticity'] = $this->hadith_model->get_all_authenticity();
    $list['main_content'] = 'add_hadith_view';
    $this->load->view('includes/template',$list);
    
    if( !empty($this->input->post('mysubmit'))):
      $data['hadith_plain_ar'] = $this->input->post('txt_plain_ar');
      $data['hadith_plain_en'] = $this->input->post('txt_plain_en');
      $data['hadith_plain_ur'] = $this->input->post('txt_plain_ur');
      $data['hadith_marked_ar'] = $this->input->post('txt_marked_ar');
      $data['hadith_marked_en'] = $this->input->post('txt_marked_en');
      $data['hadith_marked_ur'] = $this->input->post('txt_marked_ur');
      $data['hadith_raw_ar'] = $this->input->post('txt_raw_ar');
      $data['authenticity_id'] = $this->input->post('ddl_authenticity_id');

      $this->load->model('hadith_model');
      $this->hadith_model->insert_hadith($data);

      echo "Successfully inserted Hadith";
    endif;

  }

  /*Method to update hadith
   *
   *@param string $hadith_code Id of hadith
   *
   *@return none
   */
  public function update($hadith_id){
    $this->load->helper('form');
    $this->load->model('hadith_model');
    $list['authenticity'] = $this->hadith_model->get_all_authenticity();
    $list['hadith_id'] = $hadith_id;
    $list['hadith'] =  $this->hadith_model->get_hadith_by_id($hadith_id);
    
    $list['main_content']= 'update_hadith_view';
    $this->load->view('includes/template',$list);

    if( !empty($this->input->post('mysubmit'))):
      $hadith['hadith_plain_ar'] = $this->input->post('txt_plain_ar');
      $hadith['hadith_plain_en'] = $this->input->post('txt_plain_en');
      $hadith['hadith_plain_ur'] = $this->input->post('txt_plain_ur');
      $hadith['hadith_marked_ar'] = $this->input->post('txt_marked_ar');
      $hadith['hadith_marked_en'] = $this->input->post('txt_marked_en');
      $hadith['hadith_marked_ur'] = $this->input->post('txt_marked_ur');
      $hadith['hadith_raw_ar'] = $this->input->post('txt_raw_ar');
      $hadith['authenticity_id'] = $this->input->post('authenticity_id');

      $this->load->model('hadith_model');
      $this->hadith_model->update_hadith($hadith_id,$hadith);

      echo "Successfully updated Hadith";
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

    $this->load->helper('url');

    $this->load->model('hadith_model');
    $this->hadith_model->delete_hadith( $hadith_id );

    echo "Deleted Hadith";
  }

}
