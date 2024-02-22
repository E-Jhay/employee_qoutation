<?php

namespace Core;

class Validator {

    public static function string($value, $min = 1, $max = INF)
    {
        $value = trim($value);
        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    public static function emailUnique($value)
    {
        $db = App::resolve('Core\Database');

        $user = $db->query("SELECT * FROM user WHERE email = :email",
            ['email' => $value
        ])->find();

        return !$user;
    }

    public static function emailUniqueExceptUser($value, $userId)
    {
        $db = App::resolve('Core\Database');

        $user = $db->query("SELECT * FROM user WHERE email = :email AND :id != id", [
            'id' => $userId,
            'email' => $value,
        ])->find();

        return !$user;
    }

    public static function phone($value)
    {
        $pattern = "((^(\+)(\d){12}$)|(^\d{11}$))";
        return preg_match($pattern, $value);
    }

    public static function password($value)
    {
        return strlen($value) >= 8;
    }

    public static function passwordConfirmed($password, $reTypePassword)
    {
        return $password == $reTypePassword;
    }
    public static function emailConfirmed($email, $confirmEmail)
    {
        return $email == $confirmEmail;
    }
}