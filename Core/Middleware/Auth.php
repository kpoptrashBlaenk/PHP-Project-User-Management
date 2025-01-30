<?php

namespace Core\Middleware;

class auth
{
    public function handle(): string|null
    {
        if (!isset($_SESSION['user'])) {
            return '/session';
        }

        return null;
    }
}