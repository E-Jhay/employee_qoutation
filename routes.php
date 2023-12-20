<?php

// return [
//     '/' => 'controllers/index.php',
//     '/users' => 'controllers/user/index.php',
//     '/user/show' => 'controllers/user/show.php',
//     '/user/create' => 'controllers/user/create.php',
//     '/user/edit' => 'controllers/user/edit.php',
//     '/user/delete' => 'controllers/user/delete.php',
// ];

// Session route
$router->get('/login', 'controllers/session/create.php')->only('guest');
$router->post('/session', 'controllers/session/store.php')->only('guest');
$router->delete('/session', 'controllers/session/destroy.php')->only('auth');


$router->get('/', 'controllers/index.php')->only('auth');

// User route
$router->get('/users', 'controllers/user/index.php')->only('auth');
$router->get('/user/show', 'controllers/user/show.php')->only('auth');
$router->delete('/user/delete', 'controllers/user/destroy.php')->only('auth');
$router->get('/user/create', 'controllers/user/create.php')->only('auth');
$router->post('/user', 'controllers/user/store.php')->only('auth');
$router->get('/user/edit', 'controllers/user/edit.php')->only('auth');
$router->put('/user/update', 'controllers/user/update.php')->only('auth');

// Role route
$router->get('/roles', 'controllers/role/index.php')->only('auth');
$router->get('/role/show', 'controllers/role/show.php')->only('auth');
$router->delete('/role/delete', 'controllers/role/destroy.php')->only('auth');
$router->get('/role/create', 'controllers/role/create.php')->only('auth');
$router->post('/role', 'controllers/role/store.php')->only('auth');
$router->get('/role/edit', 'controllers/role/edit.php')->only('auth');
$router->put('/role/update', 'controllers/role/update.php')->only('auth');

//     '/user/create' => 'controllers/user/create.php',

// dd($router->routes);