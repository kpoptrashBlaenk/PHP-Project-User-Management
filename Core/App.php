<?php

namespace Core;

class App
{
    private static $container;

    public static function setContainer(Container $container): void
    {
        static::$container = $container;
    }

    public static function container()
    {
        return static::$container;
    }
}