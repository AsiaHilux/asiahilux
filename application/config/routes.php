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
$route['default_controller'] = 'home';

$route['addCarToCountry'] = 'home/addCarToCountry';
$route['about-us'] = 'home/about_us';
$route['how-to-buy'] = 'home/how_to_buy';
$route['bank-details'] = 'home/bank_details';
$route['search'] = 'home/search';
$route['signup'] = 'home/signup';
$route['send-inquiry'] = 'home/send_inq';
$route['send-quick-inquiry'] = 'home/send_quick_inq';
$route['country/(:any)'] = 'home/country_car/$1';
$route['country-temp/(:any)'] = 'home/country_car_temp/$1';
$route['double-cab'] = 'home/double_cab';
$route['standard-cab'] = 'home/standard_cab';
$route['revo'] = 'home/revo';
$route['ford'] = 'home/ford';

$route['why-choose-asia-hilux'] = 'home/whychooseasiahilux';
$route['how-to-buy'] = 'home/howtobuy';
$route['export-information'] = 'home/exportinformation';
$route['faq'] = 'home/faq';
$route['our-staff'] = 'home/ourstaff';

$route['car-detail/(:any)/(:any)'] = 'home/car_detail/$1/$1';
$route['car-detail-temp/(:any)/(:any)'] = 'home/car_detail_temp/$1/$1';
$route['car-detail-temp2/(:any)/(:any)'] = 'home/car_detail_temp2/$1/$1';
$route['car-detail/(:any)'] = 'home/car_detail/$1';
$route['car-list'] = 'home/get_cars';
// $route['test'] = 'home/send';
$route['car/(:any)'] = 'home/get_car/$1';
$route['images/(:any)'] = 'home/get_car_images/$1';

/**/

$route['search/(:any)/(:any)'] = 'home/result/$1/$2';
$route['by-price/(:any)/(:any)'] = 'home/by_price/$1/$2';
$route['car-discount/(:any)/(:any)'] = 'home/by_discount/$1/$2';
$route['brand/(:any)'] = 'home/by_category/$1';
$route['price-over/(:any)'] = 'home/over/$1';
$route['price-under/(:any)'] = 'home/under/$1';
$route['all-new-arrival'] = 'home/see_all_new_arrival';
$route['all-discounted'] = 'home/see_all_discounted';
$route['all-clearance'] = 'home/see_all_clearance';
$route['car-type/(:any)'] = 'home/get_search_by_type/$1';

$route['model/(:any)'] = 'home/by_model/$1';


$route['404_override'] = 'home/url_not_found';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'home/login';
$route['sign_up'] = 'home/sign_up';
$route['dashboard'] = 'home/dashboard';
$route['orderhistory'] = 'home/orderhistory';
$route['cap'] = 'home/cap';
$route['yourinformation'] = 'home/yourinformation';
$route['consignee'] = 'home/consignee';
$route['deposit'] = 'home/deposit';
$route['preference'] = 'home/preference';
$route['bookmark'] = 'home/bookmark';
$route['canlist'] = 'home/canlist';
$route['wishlist'] = 'home/wishlist';
$route['edit_password'] = 'home/edit_password';
$route['change_pwd'] = 'home/change_pwd';