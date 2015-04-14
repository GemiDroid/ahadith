<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller{
    function _remap( $method, $param ) {
    
        if( $method == 'index' ):
            $this->index();
    
        //for all other method names, display an error message
        else:
            $list['error_msg'] = "The Page you are trying to view does not exists. Use the menu if you have access.";
            $list['main_content'] = "message_view";
            $this->load->view('includes/template', $list);
        endif;
    }
	
//	/*Method to search hadith
//	 *
//	 *@return none
//	 *
//	 */
//
    public function index(){
        $this->load->helper('form');
        
        $this->load->model('hadith_book_model');
        $list['hadith_books'] = $this->hadith_book_model->get_hadith_books();
        
        $list['main_content'] = 'search_view';

        if(empty($this->input->post('mysubmit'))):
     
            //if dwopdown list is empty upload default 
            $hadith_book_id = empty($this->input->post('ddl_hadith_book'))? $list['hadith_books'][0]->hadith_book_id : $this->input->post('ddl_hadith_book');
            
            
            $this->load->model('hadith_book_model');
            $list['books'] = $this->hadith_book_model->get_all_books($hadith_book_id);
            $book_id = empty($this->input->post('ddl_books'))? $list['books'][0]->book_id : $this->input->post('ddl_book');
            
            $this->load->view('includes/template',$list);
        
        else:
            //echo "clicked";
            $search_language = $this->input->post('search_language');
            $type_search_text = $this->input->post('type_search_text');
            $search_text_option = $this->input->post('txt_word');
            $display_per_page = $this->input->post('ddl_display_per_page');
            $hadith_book = $this->input->post('ddl_hadith_book');
            $book = $this->input->post('ddl_book');
            $all_hadith_books = $this->input->post('all_hadith_books');
            $all_books = $this->input->post('all_books');
            
            //var_dump($type_search_text);
            //if(($all_hadith_books)):
            //     $hadith_book = '';
            //     
            //else:
            //     $hadith_book = 1;
            //endif;
            
            $hadith_book_id = empty($this->input->post('ddl_hadith_book'))? $list['hadith_books'][0]->hadith_book_id : $this->input->post('ddl_hadith_book');
            $this->load->model('hadith_book_model');
            $list['books'] = $this->hadith_book_model->get_all_books($hadith_book_id);
            $list['ahadith'] = $this->hadith_book_model->get_all_hadith_books($search_language,$type_search_text,$search_text_option,$hadith_book,$book,$all_hadith_books,$all_books);
           
           
            //$book_id = empty($this->input->post('ddl_books'))? $list['books'][0]->book_id : $this->input->post('ddl_book');
            //$list['book'] = $this->hadith_book_model->get_book_by_id($book_id);
            //$data['hadith_book_names'] = $this->hadith_book_model->get_hadith_book_by_id($hadith_book_id);
            //
            //for($j=0;$j<count($data['hadith_book_names']);$j++):
            //    //$list['ahadith'][$j]->hadith_book_name = $data['hadith_book_names'][$j]->hadith_book_title_en;
            //  //$list['ahadith'][$j]->hadith_book_name = $this->hadith_book_model->get_hadith_book_by_id( $hadith_book_id )->hadith_book_title_en;
            //endfor;
            //
            //for($i=0;$i<count($list['book']);$i++):
            //    $list['ahadith'][$i]->book_name = $list['book'][$i]->book_title_en;   
            //endfor;

            $this->load->view('includes/template',$list);
            
        endif;
    }
}
