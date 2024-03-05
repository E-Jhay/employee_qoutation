<?php

use Core\Role;
use Core\Session;

authorize((int)$_SESSION['user']['role_id'] == Role::ADMIN);

view("company/create.view.php", [
    'heading' => "Create Company",
    'errors' => Session::get('errors')
]);