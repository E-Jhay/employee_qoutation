<?php

$config = require "config.php";
$db = new Database($config['database']);

$heading = "Users";



// $id = $_GET['id'];
$query = "SELECT * FROM user";

$users = $db->query($query)->fetchAll();

require "views/users.view.php";