<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "welcome";
$route['404_override'] = '';

$route['user/signin'] = "user/signin";
$route['user/signout'] = "user/signout";
$route['user/register'] = "user/registration";
$route['user/forgot-password'] = "user/forgot_password";
$route['user/forgot-username'] = "user/forgot_username";
$route['user/home'] = "user/home";

$route['editor/chapter/add'] = "editor/chapter/add";
$route['editor/chapter/update/(:any)'] = "editor/chapter/update/$1";
$route['editor/authenticity/add'] = "editor/authenticity/add";
$route['editor/authenticity/update/(:any)'] = "editor/authenticity/update/$1";
$route['editor/hadith_book/create'] = "editor/hadith_book/create";
$route['editor/hadith_book/delete/(:any)'] = "editor/hadith_book/delete/$1";
$route['editor/hadith/add'] = "editor/hadith/add";
$route['editor/hadith/update/(:any)'] = "editor/hadith/update/$1";

$route['(:any)/book/(:any)/chapter/(\d+)/hadith'] = "hadith_book/view/$1/$2/$3/1";
$route['(:any)/book/(:any)/chapter/(\d+)/hadith/(\d+)'] = "hadith_book/view/$1/$2/$3/$4";
$route['(:any)/book/(:any)/chapter'] = "hadith_book/view/$1/$2/1";
$route['(:any)/book/(:any)/chapter/(\d+)'] = "hadith_book/view/$1/$2/$3";
$route['(:any)/book'] = "hadith_book/view/$1/1";
$route['(:any)/book/(:any)'] = "hadith_book/view/$1/$2";
$route['(:any)'] = "hadith_book/view/$1";



/* End of file routes.php */
/* Location: ./application/config/routes.php */