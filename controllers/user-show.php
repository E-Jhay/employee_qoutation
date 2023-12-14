<?php

$config = require "config.php";
$db = new Database($config['database']);

$heading = "User";



$user = $db->query("SELECT * FROM user WHERE id = :id",
            ['id' => $_GET['id']
        ])->find();

require "views/user-show.view.php";