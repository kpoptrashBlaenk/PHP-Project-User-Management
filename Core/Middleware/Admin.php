<?php

namespace Core\Middleware;

use Core\App;

class Admin
{
    public function handle(): string|null
    {
        if (!isset($_SESSION['user'])) {
            return '/session';
        }

        if ($_SESSION['user']['rights'] !== 'Admin') {
            return '/';
        }

        return null;
    }
}