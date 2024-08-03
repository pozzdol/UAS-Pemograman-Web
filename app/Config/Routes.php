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
