<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 
$routes->get('/', 'Home::index');*/
$routes->get('/test/', 'Test::index');

$routes->get('/', 'User::login');

$routes->get('user/register', 'User::register');
$routes->post('user/registerUser', 'User::registerUser');
$routes->get('user/login', 'User::login');
$routes->post('user/loginUser', 'User::loginUser');
$routes->get('user/logout', 'User::logout');

$routes->get('letter/create', 'Letter::create');
$routes->post('letter/createLetter', 'Letter::createLetter');
$routes->get('letter/list', 'Letter::list');

$routes->get('letter/admin', 'Letter::admin');
$routes->get('letter/markAsRead/(:num)', 'Letter::markAsRead/$1');
$routes->get('letter/reply/(:num)', 'Letter::reply/$1');
$routes->post('letter/sendReply/(:num)', 'Letter::sendReply/$1');
$routes->get('letter/delete/(:num)', 'Letter::delete/$1');

$routes->get('admin/login', 'Admin::login');
$routes->post('admin/loginAdmin', 'Admin::loginAdmin');
$routes->get('admin/logout', 'Admin::logout');
$routes->get('admin/dashboard', 'Admin::dashboard');
$routes->get('admin/markAsRead/(:num)', 'Admin::markAsRead/$1');
$routes->get('admin/reply/(:num)', 'Admin::reply/$1');
$routes->post('admin/sendReply/(:num)', 'Admin::sendReply/$1');
$routes->get('admin/delete/(:num)', 'Admin::delete/$1');



