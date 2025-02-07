<?php

namespace Http\Forms;

use Core\Validator;

class DepotForm extends BaseForm
{
    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;

        if (!Validator::date($this->attributes['date'])) {
            $this->errors['date'] = 'Date not valid';
        }

        if (!Validator::number($this->attributes['price'])) {
            $this->errors['price'] = 'Price not valid';
        }
    }

    public static function cardNotExists(array $attributes)
    {
        $instance = new static($attributes);

        $instance->errors['card'] = 'Card doesn\'t exist';

        return $instance->throw();
    }

    public static function depotExists(array $attributes)
    {
        $instance = new static($attributes);

        $instance->errors['all'] = 'Depot already exists';

        return $instance->throw();
    }
}