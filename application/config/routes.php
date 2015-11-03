<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'main';
$route['404_override'] = '';
$route['register'] = "users/register";
$route['login'] = "users/login";
$route['dashboard/admin'] = "dashboards/dashboard_page";
$route['dashboard'] = "dashboards/dashboard_page";
$route['login_user'] = "users/login";


$route['users/show/(:any)'] = "dashboards/show_wall/$1";
$route['message_post'] = "dashboards/add_post";
$route['comment_post/(:any)'] = "dashboards/add_comment/$1";
$route['users/edit/(:any)'] = "users/admin_edit/$1";
$route['users/edit'] = "dashboards/profile_page";
$route['update_desc'] = "users/update_desc";
$route['edit/info'] = "users/change_info";
$route['edit/password'] = "users/change_password";
$route['edit/delete/(:any)'] = "users/destroy_user/$1";
$route['users/new'] = "users/admin_create_user";
$route['register_admin'] = "users/admin_create_user";

?>