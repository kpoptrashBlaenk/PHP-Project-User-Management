<?php

namespace Http\Forms;

use Core\Validator;

class CategoryForm extends BaseForm
{
    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;

        if (!Validator::string($this->attributes['category'])) {
            $this->errors['category'] = 'Category not valid';
        }
    }

    public static function categoryExists(array $attributes)
    {
        $instance = new static($attributes);

        $instance->errors['category'] = 'Category already exists';

        return $instance->throw();
    }
}