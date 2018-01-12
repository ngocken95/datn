<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['homepage']='site/homepage';
$route['homepage/like/(:num)']='site/homepage/like/$1';

$route['intro']='site/intro';
$route['news']='site/news';
$route['news/detail/(:num)']='site/news/detail/$1';

$route['category']='site/category';
$route['category/type/(:num)']='site/category/type';
$route['category/brand/(:num)']='site/category/brand';

$route['register']='site/register';
$route['register/register']='site/register/register';
$route['register/check_user']='site/register/check_user';

$route['login']='site/login';
$route['login/login']='site/login/login';
$route['login/logout']='site/login/logout';

$route['library']='site/library';
$route['library/video']='site/library/video';
$route['library/image']='site/library/image';

$route['cart']='site/cart';
$route['cart/additem']='site/cart/additem';
$route['cart/updatecart']='site/cart/updatecart';
$route['cart/addorder']='site/cart/addorder';
$route['cart/delete/(:any)']='site/cart/delete/$1';

$route['contact']='site/contact';
$route['contact/add']='site/contact/add';

$route['search']='site/search';

$route['product_detail/(:num)']='site/product_detail';
//=====================================
$route['admin']='admin/login';