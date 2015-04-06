<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Editor extends CI_Controller {

  function _remap( $method, $param ) {
			
    if( $method == 'chapter' ):
    
      //set default for parameter action
      if( !isset( $param[0] ) ):
          $param[0] = '';
      endif;
      
      //set default for paramter id
      if( !isset( $param[1] ) ):
          $param[1] = '';
      endif;
      
      $this->chapter( $param[0], $param[1] );
      
    elseif( $method == 'authenticity' ):
      
      //set default for parameter action
      if( !isset( $param[0] ) ):
          $param[0] = '';
      endif;
      
      //set default for paramter id
      if( !isset( $param[1] ) ):
          $param[1] = '';
      endif;
      
      $this->authenticity( $param[0], $param[1] );
      
    elseif( $method == 'hadith_book' ):
      
      //set default for parameter action
      if( !isset( $param[0] ) ):
          $param[0] = '';
      endif;
      
      //set default for paramter id
      if( !isset( $param[1] ) ):
          $param[1] = '';
      endif;
      
      $this->hadith_book( $param[0], $param[1] );
      
    elseif( $method == 'hadith' ):
      
      //set default for parameter action
      if( !isset( $param[0] ) ):
          $param[0] = '';
      endif;
      
      //set default for paramter id
      if( !isset( $param[1] ) ):
          $param[1] = '';
      endif;
      
      $this->hadith( $param[0], $param[1] );
        
    //for all other method names, display an error message
    else:
        $list['error_msg'] = "The Page you are trying to view does not exists. Use the menu if you have access.";
        $list['main_content'] = "message_view";
        $this->load->view('includes/template', $list);
    endif;
  }


  /*Method to invoke chapter add and update functions
   *
   *@param string $action can be add or update
   *@param string $id ID of chapter
   *
   *@return none
   */

  public function chapter($action='',$id=''){
    require_once('chapter.php');
    $chapter = new chapter();
    
    if($action=='add'):
      $chapter->add();
    elseif($action=='update'):
      $chapter->update($id);
    else:
      $list['error_msg'] = "The Page you are trying to view does not exists. Use the menu if you have access.";
      $list['main_content'] = "message_view";
      $this->load->view('includes/template', $list);
    endif;

  }

  /*Method to invoke authenticity add and update functions
   *
   *@param string $action can be add or update
   *@param string $id ID of authenticity
   *
   *@return none
   */

  public function authenticity($action,$id){

    require_once('authenticity.php');
    $authenticity = new authenticity();
    
    if($action=='add'):
      $authenticity->add();
    elseif($action=='update'):
      $authenticity->update($id);
    else:
     echo 'Not found';
    endif;

  }

  /*Method to invoke hadith_book add and update functions
   *
   *@param string $action can be add or update
   *@param string $id ID of hadith_book
   *
   *@return none
   */
  
  public function hadith_book($action='',$id=''){

    require_once('hadith_book.php');
    $hadith_book = new hadith_book();
    
    if($action=='create'):
      $hadith_book->create();
    elseif($action=='delete'):
      $hadith_book->delete($id);
    else:
     echo 'Not found';
    endif;

  }

  /*Method to invoke hadith add and update functions
   *
   *@param string $action can be add or update
   *@param string $id ID of hadith
   *
   *@return none
   */  
  
  public function hadith($action='',$id=''){

    require_once('hadith.php');
    $hadith = new hadith();
   
    if($action=='add'):
      $hadith->add();
    elseif($action=='update'):
      $hadith->update($id);
    else:
     echo 'Not found';
    endif;

  }
}