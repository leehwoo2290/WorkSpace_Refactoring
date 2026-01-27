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
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	
// JWT API routes
$route['api/jwt/refresh'] = 'auth/jwtcontroller/refresh';
$route['api/jwt/logout']  = 'auth/jwtcontroller/logout';

$route['default_controller'] = 'welcome';
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

// JWT API routes
$route['api/web/auth/login']['post']   = 'auth/JwtController/login';
$route['api/web/auth/me']['get']      = 'auth/JwtController/me';
$route['api/web/auth/refresh']['post'] = 'auth/JwtController/refresh';
$route['api/web/auth/logout']['post']  = 'auth/JwtController/logout';

//$route['api/web/auth/csrf']['get'] = 'auth/CsrfController/csrf';

// User API routes
$route['api/web/users']['get'] = 'user/UserController/list';
$route['api/web/user']['post'] = 'user/UserController/add';

// UserDetail API routes
//$route['api/web/user/']['get'] = 'userDetail/UserDetailController/detail';
$route['api/web/user/(:num)/basic']['get']   = 'userDetail/UserDetailController/basic/$1';
$route['api/web/user/(:num)/privacy']['get'] = 'userDetail/UserDetailController/privacy/$1';
$route['api/web/user/(:num)/office']['get']  = 'userDetail/UserDetailController/office/$1';
$route['api/web/user/(:num)/etc']['get']     = 'userDetail/UserDetailController/etc/$1';
$route['api/web/user/(:num)/career']['get']  = 'userDetail/UserDetailController/career/$1';

// UserDetail Update API routes
$route['api/web/user/(:num)/basic']['put']   = 'userDetail/UserDetailController/updateBasic/$1';
$route['api/web/user/(:num)/privacy']['put'] = 'userDetail/UserDetailController/updatePrivacy/$1';
$route['api/web/user/(:num)/office']['put']  = 'userDetail/UserDetailController/updateOffice/$1';
$route['api/web/user/(:num)/career']['put']  = 'userDetail/UserDetailController/updateCareer/$1';
$route['api/web/user/(:num)/etc']['put']     = 'userDetail/UserDetailController/updateEtc/$1';

// UserLoginLog API routes
$route['api/web/login-logs']['get'] = 'user/UserController/logList';

// License API routes
$route['api/web/licenses']['get'] = 'license/LicenseController/list';

// User licenses filter API routes
$route['api/web/licenseFilter']['get'] = 'license/LicenseController/licenseFilter';

//---------------------------------------------------------------------------------------------
$route['api/app/auth/login']['post']   = 'auth/JwtController/login';
$route['api/app/auth/me']['get']      = 'auth/JwtController/me';
$route['api/app/auth/refresh']['post'] = 'auth/JwtController/refresh';
$route['api/app/auth/logout']['post']  = 'auth/JwtController/logout';

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['docs'] = 'docs';
