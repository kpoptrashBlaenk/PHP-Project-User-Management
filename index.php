<?php

use Core\Authenticator;
use Core\CookieHandler;
use Core\Session;
use Core\ValidationException;

session_start();

const BASE_PATH = __DIR__ . '/';

require BASE_PATH . 'Core/functions.php';

spl_autoload_register(static function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require basePath("$class.php");
});

require basePath('Core/Bootstrap.php');

$router = new Core\Router();

$routes = require basePath('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

if (isset($_COOKIE['remember'])) {
    $cookies = new CookieHandler;
    $user = $cookies->checkCookie();
    $auth = new Authenticator;
    $auth->login($user);
}

try {
    $router->route($uri, $method);
} catch (ValidationException $exception) {
    Session::flash('errors', $exception->errors);
    Session::flash('old', $exception->old);
    redirect($router->previousUrl());
    exit();
}

Session::unflash();