<?php

use Core\Role;

authorize((int)$_SESSION['user']['role_id'] == Role::ADMIN);

view("role/create.view.php", [
    'heading' => 'Create Role',
    'errors' => []
]);