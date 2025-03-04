<?php

use Core\App;
use Core\Authenticator;
use Core\CookieHandler;
use Http\Forms\RegistrationForm;

$firstName = $_POST['first_name_input'];
$lastName = $_POST['last_name_input'];
$email = $_POST['email_input'];
$password = $_POST['password_input'];
$remember = $_POST['remember_input'];

$form = RegistrationForm::validate([
    'first_name' => $firstName,
    'last_name' => $lastName,
    'email' => $email,
    'password' => $password,
    'remember' => $remember
]);

$auth = new Authenticator;
$app = new App;
$db = $app->getDB();

// Check if email exists
$findUserQuery = "SELECT * FROM users WHERE mail = :email";

$user = $db->query($findUserQuery, [
    'email' => $email
])->find();

if ($user) {
    RegistrationForm::emailExists([
        'first_name' => $firstName,
        'last_name' => $lastName,
        'email' => $email,
        'password' => $password,
    ]);
}

// Add user
$insertUserQuery = "INSERT INTO users(prenom, nom, mail, password, id_droits) VALUES(:firstName, :lastName, :email, :password, :rights)";

$db->query($insertUserQuery, [
    'firstName' => $firstName,
    'lastName' => $lastName,
    'email' => $email,
    'password' => password_hash($password, PASSWORD_BCRYPT),
    'rights' => 2
]);

// Login
$isLoggedIn = $auth->attempt($email, $password);

// Check if login worked
if (!$isLoggedIn) {
    $form->error('email', 'No matching email or password')->throw();
}

if ($remember) {
    $cookies = new CookieHandler;
    $cookies->saveCookie();
}

redirect('/');