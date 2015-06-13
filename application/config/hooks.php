<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/general/hooks.html
|
*/

$hook['post_controller_constructor'][] = array(
                                    'class' => 'user_roles',
                                    'function' => 'reload',
                                    'filename' => 'User_roles.php',
                                    'filepath' => 'libraries'
                                );

$hook['post_system'][] = array(
                                'function' => 'log_queries',
                                'filename' => 'query_log_helper.php',
                                'filepath' => 'helpers'
                            );


/* End of file hooks.php */
/* Location: ./application/config/hooks.php */