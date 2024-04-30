<?php

namespace Http\Forms;

use Core\App;
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
        if(! Validator::emailConfirmed($attributes['email'], $attributes['confirm_email'])) {
            $this->errors['confirm_email'] = "Email doesn't match.";
        }

        foreach($attributes['cc_email'] as $key => $value){
            if(! Validator::emailConfirmed($attributes['cc_email'][$key], $attributes['cc_confirm_email'][$key])) {
                $count = $key + 2;
                $this->errors['confirm_email'] = "Email {$count} doesn't match.";
            }
        }

        if(! Validator::string($attributes['address_line_1'])) {
            $this->errors['address_line_1'] = "Address line 1 is required.";
        }
        if(! Validator::string($attributes['city'])) {
            $this->errors['city'] = "City is required.";
        }
        if(! Validator::string($attributes['province'])) {
            $this->errors['province'] = "Province is required.";
        }
        if(! Validator::string($attributes['contact_person'])) {
            $this->errors['contact_person'] = "Contact person is required.";
        }
        if(! Validator::string($attributes['position'])) {
            $this->errors['position'] = "Position is required.";
        }
        if(! in_array($attributes['region'], ['manila', 'province'])) {
            $this->errors['region'] = "Region is invalid.";
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
        
        $db = App::resolve('Core\Database');
        $terms = $db->query("SELECT id FROM term")->get();
        $terms = array_map(function($item) {
            return $item['id'];
        }, $terms);
        // if(! in_array($attributes['term_id'], $terms)) {
        //     $this->errors['term_id'] = "Terms is required.";
        // }
        if(! Validator::string($attributes['vat'])) {
            $this->errors['vat'] = "VAT is required.";
        }
        if(! Validator::string($attributes['delivery'])) {
            $this->errors['delivery'] = "Delivery is required.";
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