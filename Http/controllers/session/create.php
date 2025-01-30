<?php

$errors = isset($_SESSION['_flashed']) ? $_SESSION['_flashed']['errors'] : [];
$old = isset($_SESSION['_flashed']) ? $_SESSION['_flashed']['old'] : [];

view(
    'session/create.view.php',
    [
        'errors' => $errors,
        'old' => $old
    ]
);