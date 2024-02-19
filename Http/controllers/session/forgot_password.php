<?php

use Core\Session;

view("session/forgot_password.view.php", [
    'errors' => Session::get('errors')
]);