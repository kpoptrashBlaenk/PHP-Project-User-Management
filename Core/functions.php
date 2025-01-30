<?php

function dump_and_die($value): void
{
    var_dump($value);
    die();
}

function basePath(string $path): string
{
    return BASE_PATH . $path;
}

function view(string $path, array $attributes = []): void
{
    // Pass attributes into url
    extract($attributes);
    require basePath('views/' . $path);
}

function redirect($path): void
{
    header("Location: {$path}");
    exit();
}