<?php

namespace Http\Forms;

use Core\Validator;

class DepotForm extends BaseForm
{
    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;

        if (!Validator::number($this->attributes['price'])) {
            $this->errors['price'] = 'Price not valid';
        }
    }

    public static function prestationNotExists(array $attributes)
    {
        $instance = new static($attributes);

        $instance->errors['prestation'] = 'Prestation doesn\'t exists';

        return $instance->throw();
    }

    public static function categoryNotExists(array $attributes)
    {
        $instance = new static($attributes);

        $instance->errors['category'] = 'Category doesn\'t exists';

        return $instance->throw();
    }

    public static function tariffExists(array $attributes)
    {
        $instance = new static($attributes);

        $instance->errors['all'] = 'Tariff already exists';

        return $instance->throw();
    }
}