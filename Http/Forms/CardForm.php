<?php

namespace Http\Forms;

use Core\Validator;

class CardForm extends BaseForm
{
    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;

        if (!Validator::string($this->attributes['prestation'])) {
            $this->errors['prestation'] = 'Prestation not valid';
        }
    }

    public static function prestationExists(array $attributes)
    {
        $instance = new static($attributes);

        $instance->errors['prestation'] = 'Prestation already exists';

        return $instance->throw();
    }
}