<?php

global $router;

// Default
$router->get('/', 'index.php');

// Register
$router->get('/register', 'registration/create.php');
$router->post('/register', 'registration/store.php');