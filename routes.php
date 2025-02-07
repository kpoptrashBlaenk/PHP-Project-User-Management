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

// Prestation
$router->get('/admin/prestation', 'admin/prestation/show.php')->only('admin');
$router->get('/admin/prestation/create', 'admin/prestation/create.php')->only('admin');
$router->get('/admin/prestation/edit', 'admin/prestation/edit.php')->only('admin');
$router->post('/admin/prestation/store', 'admin/prestation/store.php')->only('admin');
$router->patch('/admin/prestation/update', 'admin/prestation/update.php')->only('admin');
$router->delete('/admin/prestation/destroy', 'admin/prestation/destroy.php')->only('admin');

// Card
$router->get('/admin/card', 'admin/card/show.php')->only('admin');
$router->get('/admin/card/create', 'admin/card/create.php')->only('admin');
$router->get('/admin/card/edit', 'admin/card/edit.php')->only('admin');
$router->post('/admin/card/store', 'admin/card/store.php')->only('admin');
$router->patch('/admin/card/update', 'admin/card/update.php')->only('admin');
$router->delete('/admin/card/destroy', 'admin/card/destroy.php')->only('admin');

// User
$router->get('/admin/user', 'admin/user/show.php')->only('admin');
$router->get('/admin/user/create', 'admin/user/create.php')->only('admin');
$router->get('/admin/user/edit', 'admin/user/edit.php')->only('admin');
$router->post('/admin/user/store', 'admin/user/store.php')->only('admin');
$router->patch('/admin/user/update', 'admin/user/update.php')->only('admin');
$router->delete('/admin/user/destroy', 'admin/user/destroy.php')->only('admin');