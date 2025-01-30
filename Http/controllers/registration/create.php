<?php

$_SESSION['referer'] = $_SERVER['HTTP_REFERER'];

$errors = isset($_SESSION['_flashed']) ? $_SESSION['_flashed']['errors'] : [];
$old = isset($_SESSION['_flashed']) ? $_SESSION['_flashed']['old'] : [];

view(
    'registration/create.view.php',
    [
        'errors' => $errors,
        'old' => $old
    ]
);