<?php

return [
    'database' => [
        'host' => "localhost",
        'port' => 3306,
        'dbname' => "quotation",
        'charset' => 'utf8mb4',
    ],
    'mail' => [
        'host' => "smtp.pmc.ph",
        'username' => "no-reply@pmc.ph",
        'password' => "Unimex123!",
        'port' => 587,
        'from' => 'no-reply@pmc.ph',
        'fromName' => 'Progressive Medical Corporation',
    ],
    'server' => [
        'APP_URL' => 'http://localhost:8000/',
    ]
];