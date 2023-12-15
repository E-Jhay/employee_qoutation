<?php
use Core\Database;

$config = require base_path("config.php");
$db = new Database($config['database']);

$roles = $db->query("SELECT id, name FROM role")->get();

view("user/create.php", [
    'heading' => 'Create User',
    'roles' => $roles,
    'errors' => []
]);