<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class TeamCreateForm {

    protected $errors = [];
    protected $attributes = [];

    public function __construct($attributes)
    {
        $this->attributes = $attributes;
        if(! Validator::string($attributes['name'])) {
            $this->errors['name'] = "Team name is required.";
        }

        if(! Validator::string($attributes['address'])) {
            $this->errors['address'] = "Address is required.";
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