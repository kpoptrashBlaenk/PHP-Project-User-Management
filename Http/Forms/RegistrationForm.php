<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class RegistrationForm
{
    private array $errors = [];
    private array $attributes = [];

    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
        
        if (!Validator::string($this->attributes['first_name'])) {
            $this->errors['first_name'] = 'First Name';
        }

        if (!Validator::string($this->attributes['last_name'])) {
            $this->errors['last_name'] = 'Last Name not valid';
        }

        if (!Validator::email($this->attributes['email'])) {
            $this->errors['email'] = 'Email not valid';
        }

        if (!Validator::string($this->attributes['password'])) {
            $this->errors['password'] = 'Password not valid';
        }
    }

    public static function validate(array $attributes): static
    {
        // New instance within instance
        $instance = new static($attributes);

        return $instance->failed() ? $instance->throw() : $instance;
    }

    public static function emailExists(array $attributes)
    {
        $instance = new static($attributes);

        $instance->errors['email'] = 'Email already exists';

        return $instance->throw();
    }

    public function throw(): void
    {
        ValidationException::throw($this->errors(), $this->attributes);
    }

    public function failed(): int
    {
        return count($this->errors);
    }

    public function errors(): array
    {
        return $this->errors;
    }

    public function error(string $field, string $message): RegistrationForm
    {
        $this->errors[$field] = $message;

        return $this;
    }
}