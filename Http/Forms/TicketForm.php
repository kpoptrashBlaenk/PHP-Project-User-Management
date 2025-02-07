<?php

namespace Http\Forms;

use Core\Validator;

class TicketForm extends BaseForm
{
    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;

        if (!Validator::string($this->attributes['date'])) {
            $this->errors['date'] = 'Date not valid';
        }
    }

    public static function cardNotExists(array $attributes)
    {
        $instance = new static($attributes);

        $instance->errors['card'] = 'Card doesn\'t exist';

        return $instance->throw();
    }
}