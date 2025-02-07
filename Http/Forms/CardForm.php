<?php

namespace Http\Forms;

use Core\Validator;

class CardForm extends BaseForm
{
    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;

        if (!Validator::string($this->attributes['name'])) {
            $this->errors['name'] = 'Name not valid';
        }

        if (!Validator::number($this->attributes['caution'])) {
            $this->errors['caution'] = 'Caution not valid';
        }

        if (!Validator::string($this->attributes['date'])) {
            $this->errors['date'] = 'Date not valid';
        }
    }

    public static function categoryNotExists(array $attributes)
    {
        $instance = new static($attributes);

        $instance->errors['category'] = 'Category doesn\'t exist';

        return $instance->throw();
    }
}