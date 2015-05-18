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
		
		$this->load->model('hadith_book_model');
		$this->load->helper('form');
		
		//detect an ajax call, which will happen when the user change the hadith_book_id
        if( $this->input->is_ajax_request() ):
            $data = $this->input->post('data');
			if ($data['task'] == 'load-books'):
				
				//get all books from hadith_book_id
				$books = $this->hadith_book_model->get_all_books($data['hadith_book_id']);	
				
				//get options for books select drop down
				$books_html='';
				if( !empty( $books ) ):
					foreach( $books as $row ):
						$books_html .= '<option value="'.$row->book_id.'"'. set_select('ddl_book',$row->book_id, FALSE) .' >'. $row->book_title_en .'</option>';
					endforeach;
				else:
					$books_html= '<option>None</option>';
				endif;
				
				$data = new stdClass();
				$data->books = $books_html;
				
				echo json_encode( $data );
				return;
			endif;
		endif;
        
		//get hadith books
        $list['hadith_books'] = $this->hadith_book_model->get_hadith_books();
		
		$hadith_book_id = $list['hadith_books'][0]->hadith_book_id;
		
        $this->load->model('hadith_book_model');
            
		$list['books'] = $this->hadith_book_model->get_all_books($hadith_book_id);
		
        if( !empty( $this->input->post() ) ):
		
			//echo "<pre>"; print_r( $this->input->post() ); echo "</pre>";
		
			//get all post data
            $search_language = $this->input->post('rad_search_language');
            $type_search_text = $this->input->post('txt_search_text');
            $search_text_option = $this->input->post('rad_word');
            $display_per_page = $this->input->post('ddl_display_per_page');
            $hadith_book = $this->input->post('ddl_hadith_book');
            $book_id = $this->input->post('ddl_book');
            $all_hadith_books = $this->input->post('chk_hadith_books');
            $all_books = $this->input->post('chk_all_books');            
                        //
            $hadith_book_id = empty( $hadith_book )? $list['hadith_books'][0]->hadith_book_id : $hadith_book;
                
            $this->load->model('hadith_book_model');

	    $list['books'] = $this->hadith_book_model->get_all_books($hadith_book_id);
            $list['ahadith'] = $this->hadith_book_model->get_all_hadith_books($search_language,$type_search_text,$search_text_option,$hadith_book,$book_id,$all_hadith_books,$all_books,$display_per_page);
	    
            //$list['ahadith']->word = $type_search_text;
                
                
                if( !empty( $list['ahadith'] ) ):
                        
                        //get hadith_book_name for each hadith
                        for($j=0;$j<count($list['ahadith']);$j++):
                            $list['ahadith'][$j]->hadith_book_name = $this->hadith_book_model->get_hadith_book_by_id( $list['ahadith'][$j]->hadith_book_id )->hadith_book_title_en;
                            
                        endfor;
                        
                        $this->load->model('book_model');
                        
                        //get book_name for each hadith
                        for($i=0;$i<count($list['ahadith']);$i++):
                           $list['ahadith'][$i]->book_name = $this->book_model->get_book_by_id( $list['ahadith'][$i]->book_id )->book_title_en;   
                        endfor;
                endif;
        endif;
		$list['main_content'] = 'search_view';
		
		$this->load->view('includes/template',$list);
    }
}
