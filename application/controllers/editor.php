<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Editor extends CI_Controller {
//private $chapter = null;

  public function __construct(){


  }

  public function index(){
    echo 'running';
  }
   public function chapter($action='',$id=''){
     require_once('chapter.php');
     $chapter = new chapter();

     //$id = null;
     if($action=='add'):
       $chapter->add();
     elseif($action=='update'):
       $chapter->update($id);
    else:
      echo 'Not found';
   endif;

   }


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
