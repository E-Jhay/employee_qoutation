<?php

$config = require "config.php";
$db = new Database($config['database']);

$heading = "User";



$id = $_GET['id'];
$query = "SELECT * FROM user WHERE id = :id";

$user = $db->query($query, [':id' => $id])->fetch();

require "views/user-show.view.php";