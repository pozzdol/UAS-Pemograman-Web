<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/auth/register', 'Auth::register');
$routes->post('/auth/registerProcess', 'Auth::registerProcess');
$routes->get('/auth/login', 'Auth::login');
$routes->post('/auth/loginProcess', 'Auth::loginProcess');
$routes->get('/auth/logout', 'Auth::logout');
$routes->get('/auth/forgotPassword', 'Auth::forgotPassword');
$routes->post('/auth/forgotPasswordProcess', 'Auth::forgotPasswordProcess');
$routes->get('/auth/resetPassword', 'Auth::resetPassword');
$routes->post('/auth/resetPasswordProcess', 'Auth::resetPasswordProcess');
$routes->post('/telegram/webhook', 'TelegramWebhook::index');
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']);
$routes->get('all-doctors', 'Doctors::all', ['filter' => 'auth']);
$routes->get('add-doctors', 'Doctors::add', ['filter' => 'auth']);
$routes->post('doctors/addProcess', 'Doctors::addProcess', ['filter' => 'auth']);
$routes->get('doctors/edit/(:segment)', 'Doctors::edit/$1', ['filter' => 'auth']);
$routes->post('doctors/update/(:segment)', 'Doctors::update/$1', ['filter' => 'auth']);
$routes->get('doctors/delete/(:segment)', 'Doctors::delete/$1', ['filter' => 'auth']);
$routes->get('all-patients', 'Patients::all', ['filter' => 'auth']);
$routes->get('add-patients', 'Patients::add', ['filter' => 'auth']);
$routes->post('patients/addProcess', 'Patients::addProcess', ['filter' => 'auth']);
$routes->get('patients/edit/(:segment)', 'Patients::edit/$1', ['filter' => 'auth']);
$routes->post('patients/update/(:segment)', 'Patients::update/$1', ['filter' => 'auth']);
$routes->get('patients/delete/(:segment)', 'Patients::delete/$1', ['filter' => 'auth']);
