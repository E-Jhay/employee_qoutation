<?php

$config = require "config.php";
$db = new Database($config['database']);

$heading = "Users";



// $id = $_GET['id'];
$query = "SELECT user.*, role.name as role FROM user JOIN role ON user.role_id = role.id ORDER BY name asc";

$users = $db->query($query)->get();

require "views/users.view.php";