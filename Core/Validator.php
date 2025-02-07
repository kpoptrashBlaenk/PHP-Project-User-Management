<?php

namespace Core;

class Validator
{

    public static function string(string $value, int $min = 1, int|float $max = INF): bool
    {
        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function number(string $value, int $min = 0, int|float $max = INF): bool
    {
        return is_numeric($value) && $value >= $min && $value <= $max;
    }

    public static function email(string $value): bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}