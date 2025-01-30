<?php

namespace Core\Middleware;

use Core\App;

class User
{
    public function handle(): string|null
    {
        if (!isset($_SESSION['user'])) {
            return '/session';
        }

        if ($_SESSION['user']['rights'] !== 'User') {
            return '/';
        }

        return null;
    }
}