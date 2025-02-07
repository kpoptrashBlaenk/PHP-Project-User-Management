<?php

global $router;

// Default
$router->get('/', 'index.php');

// Register
$router->get('/register', 'registration/create.php')->only('guest');
$router->post('/register', 'registration/store.php')->only('guest');

// Session
$router->get('/session', 'session/create.php')->only('guest');
$router->post('/session', 'session/store.php')->only('guest');
$router->delete('/session', 'session/destroy.php')->only(['user', 'admin']);

// Tariff
$router->get('/tariff', 'tariff/show.php')->only(['auth']);

// ### Admin ###
$router->get('/admin/tariff', 'admin/tariff/create.php')->only('admin');
$router->get('/admin/tariff/edit', 'admin/tariff/edit.php')->only('admin');