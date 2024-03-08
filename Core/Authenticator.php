<?php

namespace Core;

class Authenticator {

    public function attempt($email, $password)
    {
        $email = strtolower($email);
        $user = App::resolve(Database::class)->query('SELECT * FROM user WHERE email = :email', [
            'email' => strtolower($email)
        ])->find();

        if($user) {
            if(password_verify($password, $user['password'])) {
                $this->login($user);

                return true;
            }
        }

        return false;
    }

    function login($user) {
        $_SESSION['user'] = $user;
    
        session_regenerate_id(true);
    }
    
    function logout()
    {
        Session::destroy();
    }
}