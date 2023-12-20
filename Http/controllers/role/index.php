<?php

use Core\App;
$db = App::resolve('Core\Database');

$roles = $db->query("SELECT * FROM role")->get();

view("role/index.view.php", [
    'heading' => "Roles",
    'roles' => $roles,
]);