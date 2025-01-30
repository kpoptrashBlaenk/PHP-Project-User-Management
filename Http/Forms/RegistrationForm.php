<?php

namespace Http\Forms;

use Core\Validator;

class RegistrationForm extends BaseForm
{
    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;

        if (!Validator::string($this->attributes['first_name'])) {
            $this->errors['first_name'] = 'First name not valid';
        }

        if (!Validator::string($this->attributes['last_name'])) {
            $this->errors['last_name'] = 'Last name not valid';
        }

        if (!Validator::email($this->attributes['email'])) {
            $this->errors['email'] = 'Email not valid';
        }

        if (!Validator::string($this->attributes['password'])) {
            $this->errors['password'] = 'Password not valid';
        }
    }

    public static function emailExists(array $attributes)
    {
        $instance = new static($attributes);

        $instance->errors['email'] = 'Email already exists';

        return $instance->throw();
    }
}