<?php

use Core\App;
$db = App::container()->resolve('Core\Database');

authorize('admin' === 'admin');

$db->query("DELETE FROM user WHERE id = :id", ['id' => $_POST['id']]);

$_SESSION['success'] = "User Deleted";
header('Location: /users');
exit();