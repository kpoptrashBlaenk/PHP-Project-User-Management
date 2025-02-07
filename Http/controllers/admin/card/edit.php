<?php

use Core\App;

$errors = isset($_SESSION['_flashed']) ? $_SESSION['_flashed']['errors'] : [];
$old = isset($_SESSION['_flashed']) ? $_SESSION['_flashed']['old'] : [];

$cardId = $_GET['card_id'];

$app = new App;
$db = $app->getDB();

// Get selected card
$getCardQuery =
    "SELECT usager.nom AS name,
            usager.id_categorie AS category_id,
            usager.montant_caution AS caution,
            usager.date_carte AS date
     FROM usager
     WHERE usager.id_carte = :card_id";

$card = $db->query($getCardQuery, [
    'card_id' => $cardId,
])->find();

// Get categories
$getCategoriesQuery =
    "SELECT categorie.id_categorie AS category_id,
            categorie.libelle_categorie AS category
     FROM categorie";

$categories = $db->query($getCategoriesQuery)->get();

view('admin/card/edit.view.php', [
    'card' => $card,
    'categories' => $categories,
    'errors' => $errors,
    'old' => $old
]);