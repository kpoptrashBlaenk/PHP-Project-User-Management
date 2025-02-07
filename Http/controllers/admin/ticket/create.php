<?php

use Core\App;

$errors = isset($_SESSION['_flashed']) ? $_SESSION['_flashed']['errors'] : [];
$old = isset($_SESSION['_flashed']) ? $_SESSION['_flashed']['old'] : [];

$app = new App;
$db = $app->getDB();

$getCardsQuery =
    "SELECT usager.id_carte AS card_id
     FROM usager";

$cards = $db->query($getCardsQuery)->get();

view('admin/ticket/create.view.php', [
    'cards' => $cards,
    'errors' => $errors,
    'old' => $old
]);