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

/*
Here are a few routing examples:
$route['journals'] = "blogs";

A URL containing the word "journals" in the first segment will be remapped to the "blogs" class.
$route['blog/joe'] = "blogs/users/34";

A URL containing the segments blog/joe will be remapped to the "blogs" class and the "users" method. The ID will be set to "34".
$route['product/(:any)'] = "catalog/product_lookup";

A URL with "product" as the first segment, and anything in the second will be remapped to the "catalog" class and the "product_lookup" method.
$route['product/(:num)'] = "catalog/product_lookup_by_id/$1";

A URL with "product" as the first segment, and a number in the second will be remapped to the "catalog" class and the "product_lookup_by_id" method passing in the match as a variable to the function.

A typical RegEx route might look something like this:
$route['products/([a-z]+)/(\d+)'] = "$1/id_$2";

In the above example, a URI similar to products/shirts/123 would instead call the shirts controller class and the id_123 function.
*/
/* End of file routes.php */
/* Location: ./application/config/routes.php */