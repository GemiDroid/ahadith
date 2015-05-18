<?php if( !defined('BASEPATH') ): exit('No direct script access allowed'); endif;
/**
 * Header Redirect
 *
 * Extended the redirect() of the system to log queries
 *
 * @access	public
 * @param	string	the URL
 * @param	string	the method: location or redirect
 * @return	string
 */
if( !function_exists('redirect') ):
	function redirect($uri = '', $method = 'location', $http_response_code = 302) {
		//before executing a redirect command, make a call to log all the queries executed so far
		$CI =& get_instance();
		$CI->load->helper('query_log_helper');
		log_queries();
		
		//this code below is copied from the system url_helper redirect function
		if( !preg_match('#^https?://#i', $uri) ):
			$uri = site_url($uri);
		endif;
		
		switch($method):
			case 'refresh':
				header("Refresh:0;url=".$uri);
				break;
			default:
				header("Location: ".$uri, TRUE, $http_response_code);
				break;
		endswitch;
		exit;
	}
endif;

// ------------------------------------------------------------------------

/* End of file MY_url_helper.php */
/* Location: ./application/helpers/MY_url_helper.php */