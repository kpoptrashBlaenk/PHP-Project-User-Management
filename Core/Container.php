<?php

namespace Core;

// Container to bind functions
class Container
{
    private array $bindings = [];

    public function bind(string $key, callable $function): void
    {
        $this->bindings[$key] = $function;
    }

    public function resolve(string $key): mixed
    {
        if (!array_key_exists($key, $this->bindings)) {
            throw new \Exception("No binding found for this {$key}");
        }

        $function = $this->bindings[$key];

        return $function;
    }


}