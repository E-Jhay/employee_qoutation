<?php

use Core\Role;
use Core\Session;

authorize((int)$_SESSION['user']['role_id'] == Role::ADMIN);

view("role/create.view.php", [
    'heading' => 'Create Role',
    'errors' => Session::get('errors')
]);