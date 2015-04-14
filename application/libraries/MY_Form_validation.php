<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');
    
  class MY_Form_validation extends CI_Form_validation {
    public function __construct() {
        parent::__construct();
    }
         
    /*
     * Method to validate duplicate username
     *
     * @param string $str
     * @return bool
     */
    public function duplicate_user_name( $str ) {
      
      $CI =& get_instance();
      
      $CI->load->model('user_model');
      
      $is_available = $CI->user_model->get_user_by_id( $str );
      
      if( !empty($is_available) ):
        $this->set_message('duplicate_user_name', 'Username is not available.');
        return FALSE;
      endif;
      
      return TRUE;
    }
    
    /*
     * Method to validate duplicate email
     *
     * @param string $str
     * @return bool
     */
    public function duplicate_email( $str ) {
      
      $CI =& get_instance();
      
      $is_available = $CI->user_model->get_user_by_email( $str );
      
      if( !empty($is_available) ):
        $this->set_message('duplicate_email', 'Email is already in use.');
        return FALSE;
      endif;
      
      return TRUE;
    }    
  }