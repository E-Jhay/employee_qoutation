<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class QuotationCreateForm {

    protected $errors = [];
    protected $attributes = [];

    public function __construct($attributes)
    {
        $this->attributes = $attributes;
        if(! Validator::string($attributes['name'])) {
            $this->errors['name'] = "Customer name is required.";
        }

        if(! Validator::email($attributes['email'])) {
            $this->errors['email'] = "Email is required.";
        }

        if(! Validator::string($attributes['address'])) {
            $this->errors['address'] = "Address is required.";
        }
        if(! Validator::string($attributes['contact_person'])) {
            $this->errors['contact_person'] = "Contact person is required.";
        }
        if(! Validator::string($attributes['position'])) {
            $this->errors['position'] = "Position is required.";
        }
        // if(! Validator::string($attributes['territory'])) {
        //     $this->errors['territory'] = "Territory is required.";
        // }
        // if(! Validator::string($attributes['tel_no'])) {
        //     $this->errors['tel_no'] = "Tel / Fax no is required.";
        // }
        // if(! Validator::string($attributes['validity'])) {
        //     $this->errors['validity'] = "Validity is required.";
        // }
        // if(! Validator::string($attributes['delivery'])) {
        //     $this->errors['delivery'] = "Delivery is required.";
        // }
        if(! Validator::string($attributes['terms'])) {
            $this->errors['terms'] = "Terms is required.";
        }
        if(! Validator::string($attributes['needed_at'])) {
            $this->errors['needed_at'] = "Date needed is required.";
        }

    }

    public static function validate($attributes)
    {
        $instance = new static($attributes);
        return $instance;
    }

    public function failed()
    {
        return count($this->errors);
    }

    public function throw()
    {
        return $this->errors;
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