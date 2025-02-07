<?php

use Core\App;

$errors = isset($_SESSION['_flashed']) ? $_SESSION['_flashed']['errors'] : [];
$old = isset($_SESSION['_flashed']) ? $_SESSION['_flashed']['old'] : [];

$app = new App;
$db = $app->getDB();

view('admin/prestation/create.view.php', [
    'errors' => $errors,
    'old' => $old
]);