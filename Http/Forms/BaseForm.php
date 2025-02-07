<?php

namespace Http\Forms;

use Core\ValidationException;

class BaseForm
{
    protected array $errors = [];
    protected array $attributes = [];

    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
    }

    public static function validate(array $attributes): static
    {
        // New instance within instance
        $instance = new static($attributes);

        return $instance->failed() ? $instance->throw() : $instance;
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

    public function error(string $field, string $message): static
    {
        $this->errors[$field] = $message;

        return $this;
    }
}