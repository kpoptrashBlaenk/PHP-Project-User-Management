<?php

namespace Http\Forms;

use Core\Validator;

class TariffForm extends BaseForm
{
    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;

        if (!Validator::number($this->attributes['price'])) {
            $this->errors['price'] = 'Price not valid';
        }
    }
}