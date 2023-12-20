<?php

use Core\App;
$db = App::resolve('Core\Database');

authorize('admin' === 'admin');

$db->query("DELETE FROM role WHERE id = :id", ['id' => $_POST['id']]);

$_SESSION['success'] = "Role Deleted";
header('Location: /roles');
exit();