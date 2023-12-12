<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/' => 'controllers/index.php',
    '/users' => 'controllers/users.php',
    '/user/show' => 'controllers/user-show.php',
];

function abort($code = 404) {
    http_response_code($code);

    require "views/{$code}.php";

    die();
}

function routeToController($uri, $routes) {
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort(404);
    }
}

routeToController($uri, $routes);