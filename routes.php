<?php

// return [
//     '/' => 'controllers/index.php',
//     '/users' => 'controllers/user/index.php',
//     '/user/show' => 'controllers/user/show.php',
//     '/user/create' => 'controllers/user/create.php',
//     '/user/edit' => 'controllers/user/edit.php',
//     '/user/delete' => 'controllers/user/delete.php',
// ];

$router->get('/', 'controllers/index.php')->only('auth');
$router->get('/users', 'controllers/user/index.php')->only('auth');
$router->get('/user/show', 'controllers/user/show.php')->only('auth');
$router->delete('/user/delete', 'controllers/user/destroy.php')->only('auth');
$router->get('/user/create', 'controllers/user/create.php')->only('auth');
$router->post('/user', 'controllers/user/store.php')->only('auth');
$router->get('/user/edit', 'controllers/user/edit.php')->only('auth');
$router->put('/user/update', 'controllers/user/update.php')->only('auth');
$router->get('/login', 'controllers/session/create.php')->only('guest');
$router->post('/session', 'controllers/session/store.php')->only('guest');
$router->delete('/session', 'controllers/session/destroy.php')->only('auth');
//     '/user/create' => 'controllers/user/create.php',

// dd($router->routes);