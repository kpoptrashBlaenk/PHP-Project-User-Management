<?php

namespace Http\Forms;

use Core\Validator;

class UserForm extends BaseForm
{
    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;

        if (!Validator::string($this->attributes['last_name'])) {
            $this->errors['last_name'] = 'Last name not valid';
        }

        if (!Validator::string($this->attributes['first_name'])) {
            $this->errors['first_name'] = 'First name not valid';
        }

        if (!Validator::email($this->attributes['email'])) {
            $this->errors['email'] = 'Email not valid';
        }
    }

    public static function rightsNotExists(array $attributes)
    {
        $instance = new static($attributes);

        $instance->errors['rights'] = 'Right doesn\'t exist';

        return $instance->throw();
    }
}