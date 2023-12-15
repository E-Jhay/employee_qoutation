<?php

use Core\Database;

$config = require base_path("config.php");
$db = new Database($config['database']);

// $heading = "User Information";

authorize('admin' === 'admin');

$db->query("DELETE FROM user WHERE id = :id", ['id' => $_POST['id']]);

$_SESSION['success'] = "User Deleted";
header('Location: /users');
exit();