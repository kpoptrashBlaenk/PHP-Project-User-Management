<?php

use Core\Authenticator;
use Core\CookieHandler;
use Http\Forms\LoginForm;

$email = $_POST['email_input'];
$password = $_POST['password_input'];
$remember = $_POST['remember_input'];

$form = LoginForm::validate([
    'email' => $email,
    'password' => $password,
    'remember' => $remember
]);

$auth = new Authenticator;

$isSignedIn = $auth->attempt($email, $password);

if (!$isSignedIn) {
    $form->notFound([
        'email' => $email,
        'password' => $password,
        'remember' => $remember
    ]);
}

if ($remember) {
    $cookies = new CookieHandler;
    $cookies->saveCookie();
}

redirect('/');