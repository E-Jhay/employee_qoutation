<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class UpdatePassword {

    protected $attributes;
    protected $errors = [];

    public function __construct($attributes)
    {
        $this->attributes = $attributes;
        
        if(! Validator::passwordConfirmed($attributes['password'], $attributes['confirm_password'])) {
            $this->errors['password'] = "Password doesn't match.";
        }

        if(! Validator::password($attributes['password'])) {
            $this->errors['password'] = "Password Must Contain At Least 8 Characters.";
        }
        if($attributes['email'] == '') {
            $this->errors['password'] = "Account not found, please click the link sent to your email.";
        }
    }

    public static function validate($attributes)
    {
        $instance = new static($attributes);
        return $instance->failed() ? $instance->throw() : $instance;
    }

    public function failed()
    {
        return count($this->errors);
    }

    public function throw()
    {
        ValidationException::throw($this->errors, $this->attributes);
    }

    public function errors()
    {
        return $this->errors;
    }

    public function error($field, $message)
    {
        $this->errors[$field] = $message;
        
        return $this;
    }
}
