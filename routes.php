<?php

global $router;

// Default
$router->get('/', 'index.php');

// Register
$router->get('/register', 'registration/create.php');
$router->post('/register', 'registration/store.php');

// Session
$router->get('/session', 'session/create.php');
$router->post('/session', 'session/store.php');