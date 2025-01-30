<?php

namespace Http\Forms;

class LoginForm extends BaseForm
{
    public static function notFound(array $attributes)
    {
        $instance = new static($attributes);

        $instance->errors['all'] = 'Email or password is wrong';

        return $instance->throw();
    }
}