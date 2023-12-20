<?php

// return [
//     '/' => 'controllers/index.php',
//     '/users' => 'controllers/user/index.php',
//     '/user/show' => 'controllers/user/show.php',
//     '/user/create' => 'controllers/user/create.php',
//     '/user/edit' => 'controllers/user/edit.php',
//     '/user/delete' => 'controllers/user/delete.php',
// ];

$router->get('/', 'controllers/index.php');
$router->get('/users', 'controllers/user/index.php')->only('guest');
$router->get('/user/show', 'controllers/user/show.php');
$router->delete('/user/delete', 'controllers/user/destroy.php');
$router->get('/user/create', 'controllers/user/create.php');
$router->post('/user', 'controllers/user/store.php');
$router->get('/user/edit', 'controllers/user/edit.php');
$router->put('/user/update', 'controllers/user/update.php');
//     '/user/create' => 'controllers/user/create.php',

// dd($router->routes);