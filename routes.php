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

// Tariff
$router->get('/admin/tariff', 'admin/tariff/show.php')->only('admin');
$router->get('/admin/tariff/create', 'admin/tariff/create.php')->only('admin');
$router->get('/admin/tariff/edit', 'admin/tariff/edit.php')->only('admin');
$router->post('/admin/tariff/store', 'admin/tariff/store.php')->only('admin');
$router->patch('/admin/tariff/update', 'admin/tariff/update.php')->only('admin');
$router->delete('/admin/tariff/destroy', 'admin/tariff/destroy.php')->only('admin');

// Category
$router->get('/admin/category', 'admin/category/show.php')->only('admin');
$router->get('/admin/category/create', 'admin/category/create.php')->only('admin');
$router->get('/admin/category/edit', 'admin/category/edit.php')->only('admin');
$router->post('/admin/category/store', 'admin/category/store.php')->only('admin');
$router->patch('/admin/category/update', 'admin/category/update.php')->only('admin');
$router->delete('/admin/category/destroy', 'admin/category/destroy.php')->only('admin');