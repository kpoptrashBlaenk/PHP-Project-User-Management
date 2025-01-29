<?php

namespace Core;

class Session
{
    public static function flash($key, $value): void
    {
        $_SESSION['_flashed'][$key] = $value;
    }

    public static function unflash(): void
    {
        unset($_SESSION['_flashed']);
    }
}