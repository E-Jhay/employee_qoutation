<?php

// return [
//     '/' => 'index.php',
//     '/users' => 'user/index.php',
//     '/user/show' => 'user/show.php',
//     '/user/create' => 'user/create.php',
//     '/user/edit' => 'user/edit.php',
//     '/user/delete' => 'user/delete.php',
// ];

// Session route
$router->get('/login', 'session/create.php')->only('guest');
$router->post('/session', 'session/store.php')->only('guest');
$router->delete('/session', 'session/destroy.php')->only('auth');


$router->get('/dashboard', 'home/sales_manager/index.php')->only('auth');
$router->get('/', 'home/sales/index.php')->only('auth');
$router->get('/admin', 'home/admin/index.php')->only('auth');

// User route
$router->get('/users', 'user/index.php')->only('auth');
$router->get('/user/show', 'user/show.php')->only('auth');
$router->delete('/user/delete', 'user/destroy.php')->only('auth');
$router->get('/user/create', 'user/create.php')->only('auth');
$router->post('/user', 'user/store.php')->only('auth');
$router->get('/user/edit', 'user/edit.php')->only('auth');
$router->put('/user/update', 'user/update.php')->only('auth');

// Role route
$router->get('/roles', 'role/index.php')->only('auth');
$router->get('/role/show', 'role/show.php')->only('auth');
$router->delete('/role/delete', 'role/destroy.php')->only('auth');
$router->get('/role/create', 'role/create.php')->only('auth');
$router->post('/role', 'role/store.php')->only('auth');
$router->get('/role/edit', 'role/edit.php')->only('auth');
$router->put('/role/update', 'role/update.php')->only('auth');

// Validity route
$router->get('/validity', 'validity/index.php')->only('auth');
$router->post('/validity/update', 'validity/update.php')->only('auth');

// Role route
$router->get('/teams', 'team/index.php')->only('auth');
$router->get('/team/show', 'team/show.php')->only('auth');
$router->delete('/team/delete', 'team/destroy.php')->only('auth');
$router->get('/team/create', 'team/create.php')->only('auth');
$router->post('/team', 'team/store.php')->only('auth');
$router->get('/team/edit', 'team/edit.php')->only('auth');
$router->put('/team/update', 'team/update.php')->only('auth');

// Quotation route
$router->get('/get-quotations', 'quotation/getQuotations.php')->only('auth');
$router->get('/quotations', 'quotation/index.php')->only('auth');
$router->get('/quotation/show', 'quotation/show.php')->only('auth');
$router->delete('/quotation/delete', 'quotation/destroy.php')->only('auth');
$router->get('/quotation/create', 'quotation/create.php')->only('auth');
$router->post('/quotation', 'quotation/store.php')->only('auth');
$router->get('/quotation/edit', 'quotation/edit.php')->only('auth');
$router->post('/quotation/update', 'quotation/update.php')->only('auth'); 
$router->post('/quotation/change-status', 'quotation/changeStatus.php')->only('auth'); 

//     '/user/create' => 'user/create.php',


$router->get('/approved-quotation', 'quotation/approvedQuotation.php');
$router->post('/generate-pdf', 'quotation/generatePdf.php');

// dd($router->routes);