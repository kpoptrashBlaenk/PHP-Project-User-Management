<?php

namespace Core\Middleware;

class Guest
{
    public function handle(): string|null
    {
        if (isset($_SESSION['user'])) {
            return '/';
        }

        return null;
    }
}