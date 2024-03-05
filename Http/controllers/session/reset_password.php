<?php

use Core\App;
use Core\Database;
use Core\Session;

$db = App::resolve(Database::class);

// authorize((int)$_SESSION['user']['role_id'] == Role::ADMIN);

view("session/reset_password.view.php", [
    'errors' => Session::get('errors'),
    'email' => $_GET['email'] ?? ''
]);