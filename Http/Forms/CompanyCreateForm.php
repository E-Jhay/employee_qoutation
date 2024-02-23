<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class CompanyCreateForm {

    protected $attributes;
    protected $errors = [];

    public function __construct($attributes)
    {
        $this->attributes = $attributes;
        
        if (!Validator::string($attributes['name'])) {
            $this->errors['name'] = "Company name is required.";
        }
        
        if (!Validator::string($attributes['address_line_1'])) {
            $this->errors['address_line_1'] = "Address line 1 is required.";
        }
        
        if (!Validator::string($attributes['city'])) {
            $this->errors['city'] = "City is required.";
        }
        
        if (!Validator::string($attributes['province'])) {
            $this->errors['province'] = "Province is required.";
        }

        if (!Validator::email($attributes['email'])) {
            $this->errors['email'] = "Please provide a valid email address";
        }

        if (! in_array($attributes['status'], [1, 0])) {
            $this->errors['status'] = "Invalid status.";
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
