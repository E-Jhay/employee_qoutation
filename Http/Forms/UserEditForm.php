<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class UserEditForm {

    protected $errors = [];
    protected $attributes = [];

    public function __construct($attributes)
    {
        $this->attributes = $attributes;
        if(! Validator::string($attributes['name'])) {
            $this->errors['name'] = "Name is required.";
        }

        if(! Validator::email($attributes['email'])) {
            $this->errors['email'] = "Please provide a valid email address.";
        }

        if(! Validator::emailUniqueExceptUser($attributes['email'], $attributes['id'])) {
            $this->errors['email'] = "Email already taken.";
        }

        // if(! Validator::phone($attributes['phone'])) {
        //     $this->errors['phone'] = "Please provide a valid phone.";
        // }

        if(! Validator::string($attributes['address'])) {
            $this->errors['address'] = "Address is required.";
        }

        if(! Validator::string($attributes['role_id'])) {
            $this->errors['role_id'] = "Please provide a valid role.";
        }

        // if(! Validator::passwordConfirmed($attributes['password'], $attributes['re-type-password'])) {
        //     $this->errors['password'] = "Password doesn't match.";
        // }

        // if(! Validator::password($attributes['password'])) {
        //     $this->errors['password'] = "Password Must Contain At Least 8 Characters.";
        // }

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