<?php

use Core\App;
$db = App::container()->resolve('Core\Database');

$roles = $db->query("SELECT id, name FROM role")->get();

view("user/create.php", [
    'heading' => 'Create User',
    'roles' => $roles,
    'errors' => []
]);