<?php

use Core\Session;
use Core\ValidationException;

const BASE_PATH = __DIR__ . '/../';

// require BASE_PATH . "/vendor/autoload.php";

session_start();
date_default_timezone_set('Asia/Manila');

require BASE_PATH . "Core/functions.php";
// require base_path("Database.php");
// require base_path("Response.php");
spl_autoload_register(function($class) {
    //$class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    //require base_path("{$class}.php");
    
    // Define the PHPMailer namespace
    $phpMailerNamespace = 'PHPMailer\PHPMailer\\';

    // Check if the class belongs to PHPMailer namespace
    if (strpos($class, $phpMailerNamespace) === 0) {
        // Construct the file path for PHPMailer class
        $classFile = base_path("vendor/phpmailer/phpmailer/src/" . str_replace($phpMailerNamespace, '', $class) . ".php");
        
        // Load PHPMailer class file if it exists
        if (file_exists($classFile)) {
            require $classFile;
            return;
        }
    }

    // For other classes, load from the Core directory or other directories as needed
    // Adjust this part based on your project's directory structure
    $classFile = base_path(str_replace('\\', DIRECTORY_SEPARATOR, $class) . ".php");
    if (file_exists($classFile)) {
        require $classFile;
    }
});

require base_path('bootstrap.php');

$router = new \Core\Router();
$routes = require base_path('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
try {
    $router->route($uri, $method);
} catch (ValidationException $exception) {
    Session::flash('errors', $exception->errors);
    Session::flash('old', $exception->old);

    return redirect($router->previousUrl());
}

Session::unflash();