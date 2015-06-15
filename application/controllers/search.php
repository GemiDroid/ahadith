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
		elseif( $data['task'] == 'search-results' ):
			
			//get all post data
            $search_language = $data['search_language'];
            $type_search_text = $data['type_search_text'];
            $search_text_option = $data['search_text_option'];
            $display_per_page = $data['display_per_page'];
			//$display_per_page=1;
            $hadith_book_id = $data['hadith_book'];
            $book_id = $data['book_id'];
            $all_hadith_books = $data['all_hadith_books'];
            $all_books = $data['all_books'];
			$limit= $data['limit'];

			$this->load->model('book_model');
			$this->load->model('hadith_book_model');
			$ahadith = $this->hadith_book_model->get_all_hadith_books($search_language,$type_search_text,$search_text_option,$hadith_book_id,$book_id,$all_hadith_books,$all_books,$display_per_page,$limit);            
			
            $this->load->helper('search_helper');
			
			$search_result = '<h4>Search Results</h4>';
			
			if( !empty( $ahadith ) ):
				
				for($j=0;$j<count($ahadith);$j++):
					$ahadith[$j]->hadith_book_name = $this->hadith_book_model->get_hadith_book_by_id( $ahadith[$j]->hadith_book_id )->hadith_book_title_en;
					$ahadith[$j]->language = $search_language;
					$ahadith[$j]->book_name = $this->book_model->get_book_by_id( $ahadith[$j]->book_id )->book_title_en;
					
					$search_result .= '<div class="search-results" style="font-size: medium; text-align: justify;">';
					$search_result .= '<h4><strong>'. $ahadith[$j]->hadith_book_name.', '. $ahadith[$j]->book_name.', Hadith no,'. $ahadith[$j]->hadith_id .'</strong></h4>';
					$search_result .='<div class="hadith_lang" lang="'. strtoupper( $ahadith[$j]->language) .'">';
					$search_result .= search_results( $ahadith[$j]->hadith_body, $type_search_text );
					$search_result .='</div>';
					$search_result .='</div>';
					
				endfor;
			else:
				$search_result .='<div style="padding: 0px 15px 0px 15px; alignment-adjust: central;"> <span class="text-error">No Record Found.</span> </div>';
			endif;
			
			//$total_rows = $this->hadith_book_model->get_count_hadith_books($search_language,$type_search_text,$search_text_option,$hadith_book_id,$book_id,$all_hadith_books,$all_books);
			
			//$this->load->library('pagination');
			////$config['first_link'] = base_url().'search';
			//$config['base_url'] =  base_url().'search';
			//$config['total_rows'] = $total_rows;
			//$config['per_page'] = $display_per_page;
			////$config['uri_segment'] = 1; 
			//$this->pagination->initialize( $config );
			//$pages = $this->pagination->create_links();
			
			$data = new stdClass();
			$data->search_result = $search_result;
			//$data->pages = $pages;
			echo json_encode( $data );
			return;
		endif;
		endif;
        
		//get hadith books
        $list['hadith_books'] = $this->hadith_book_model->get_hadith_books();
		
		$hadith_book_id = $list['hadith_books'][0]->hadith_book_id;
		
        $this->load->model('hadith_book_model');
        
		$this->load->model('book_model');    
		
		$list['books'] = $this->book_model->get_all_books($hadith_book_id);
		
        if( !empty( $this->input->post() ) ):
		
			//get all post data
            $search_language = $this->input->post('rad_search_language');
            $type_search_text = $this->input->post('txt_search_text');
            $search_text_option = $this->input->post('rad_word');
            $display_per_page = $this->input->post('ddl_display_per_page');
			//$display_per_page=1;
            $hadith_book = $this->input->post('ddl_hadith_book');
            $book_id = $this->input->post('ddl_book');
            $all_hadith_books = $this->input->post('chk_hadith_books');
            $all_books = $this->input->post('chk_all_books');            
                        //
            $hadith_book_id = empty( $hadith_book )? $list['hadith_books'][0]->hadith_book_id : $hadith_book;
                
            $this->load->model('hadith_book_model');
			
			$list['books'] = $this->book_model->get_all_books($hadith_book_id);
            $list['ahadith'] = $this->hadith_book_model->get_all_hadith_books($search_language,$type_search_text,$search_text_option,$hadith_book,$book_id,$all_hadith_books,$all_books,$display_per_page);
			
            $this->load->helper('search_helper');
			
			if( !empty( $list['ahadith'] ) ):
				
				for($j=0;$j<count($list['ahadith']);$j++):
					$list['ahadith'][$j]->hadith_book_name = $this->hadith_book_model->get_hadith_book_by_id( $list['ahadith'][$j]->hadith_book_id )->hadith_book_title_en;
					$list['ahadith'][$j]->language = $search_language;
					$list['ahadith'][$j]->book_name = $this->book_model->get_book_by_id( $list['ahadith'][$j]->book_id )->book_title_en;   
				endfor;
			
			$total_rows = $this->hadith_book_model->get_count_hadith_books( $search_language,$type_search_text,$search_text_option,$hadith_book,$book_id,$all_hadith_books,$all_books);
				
			$this->load->library('pagination');
			//$config['first_link'] = base_url().'search';
			$config['base_url'] =  base_url().'search';
			$config['total_rows'] = $total_rows;
			$config['per_page'] = $display_per_page;
			//$config['uri_segment'] = 1; 
			$this->pagination->initialize( $config );
			$list['pages'] = $this->pagination->create_links();
				
			endif;
			
        endif;
        
		//pagination code	
		
		$list['main_content'] = 'search_view';
		
		$this->load->view('includes/template',$list);
    }
}
