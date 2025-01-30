<?php

namespace Core\Middleware;

class Middleware
{
    public const MAP = [
        'guest' => Guest::class,
    ];

    public static function resolve(array|null $keys): void
    {
        if (!$keys) {
            return;
        }

        $redirect = null;

        foreach ($keys as $key) {
            $middleware = static::MAP[$key] ?? false;

            if (!$middleware) {
                throw new \Exception("No matching middleware found for {$key}");
            }

            $redirect = (new $middleware)->handle();

            if (!$redirect) {
                break;
            }
        }

        if ($redirect) {
            redirect($redirect);
        }
    }
}