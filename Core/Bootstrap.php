<?php

use Core\Container;
use Core\Database;
use Core\App;

// Instantiate container
$container = new Container();

// Bind the the database instantiation to the container
$container->bind(Database::class, function (): Database {
    $config = require basePath('config.php');
    return new Database($config['Database'], $config['username'], $config['password']);
});

$db = $container->resolve(Database::class);

// Make container static and thus global
App::setContainer($container);