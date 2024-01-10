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


$router->get('/', 'index.php')->only('auth');

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

// Role route
$router->get('/teams', 'team/index.php')->only('auth');
$router->get('/team/show', 'team/show.php')->only('auth');
$router->delete('/team/delete', 'team/destroy.php')->only('auth');
$router->get('/team/create', 'team/create.php')->only('auth');
$router->post('/team', 'team/store.php')->only('auth');
$router->get('/team/edit', 'team/edit.php')->only('auth');
$router->put('/team/update', 'team/update.php')->only('auth');

// Qoutation route
$router->get('/qoutations', 'qoutation/index.php')->only('auth');
$router->get('/qoutation/show', 'qoutation/show.php')->only('auth');
$router->delete('/qoutation/delete', 'qoutation/destroy.php')->only('auth');
$router->get('/qoutation/create', 'qoutation/create.php')->only('auth');
$router->post('/qoutation', 'qoutation/store.php')->only('auth');
$router->get('/qoutation/edit', 'qoutation/edit.php')->only('auth');
$router->post('/qoutation/update', 'qoutation/update.php')->only('auth'); 
$router->post('/qoutation/change-status', 'qoutation/changeStatus.php')->only('auth'); 

//     '/user/create' => 'user/create.php',

// dd($router->routes);