<?php

use Core\App;
use Core\Role;
use Core\Session;

$db = App::resolve('Core\Database');

authorize((int)$_SESSION['user']['role_id'] == Role::ADMIN);

view("term/create.view.php", [
    'heading' => 'Create Term',
    'errors' => Session::get('errors')
]);