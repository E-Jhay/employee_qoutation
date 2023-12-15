<?php

$config = require base_path("config.php");
$db = new Database($config['database']);

// $heading = "User Information";



if(! $db->query("DELETE FROM user WHERE id = :id",
            ['id' => $_GET['id']
])){
    abort();
}

header('Location: /users');
exit();