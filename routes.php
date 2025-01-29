<?php

global $router;

// Default
$router->get('/', 'index.php');

// Register
$router->get('/register', 'registration/create.php');