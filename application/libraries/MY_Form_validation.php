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
    
    /*
    * Method to make sure ID is unique
    *
    * @param string $id
    * @param string $param. all remaining parameters will go here
    * @return bool
    */
   public function unique_id( $id, $param ) {
      
      //explode the param into an array
      $params = explode( ',' , $param );
      
      $id = trim($id);
      $edit_id = trim($params[0]);
      $type = trim($params[1]);
      
      
      $CI =& get_instance();
      
      //in edit mode, if same book id is saved again
      if( $id != $edit_id ):
      
        $is_unique = FALSE;
        
        if( $type == 'Book ID' ):
          $is_unique = $CI->book_model->get_book_by_id( $id );
        elseif( $type == 'Hadith Book ID' ):
          $CI->load->model('hadith_book_model');
          $is_unique = $CI->hadith_book_model->get_hadith_book_by_id( $id );
        elseif( $type == 'Role Title' ):
          $is_unique = $CI->role_model->get_role_by_title( $id );
        endif;
        
        if( !empty($is_unique)):
            $this->set_message('unique_id', $type. ' is already assigned.');
            return FALSE;
        endif;
       endif;
      return TRUE;
    
   }
  }