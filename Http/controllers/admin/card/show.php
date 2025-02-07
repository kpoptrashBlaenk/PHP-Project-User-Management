<?php

use Core\App;

$app = new App;
$db = $app->getDB();

$getCardsQuery =
    "SELECT usager.id_carte AS card_id,
            usager.nom AS name,
            categorie.libelle_categorie AS category,
            usager.montant_caution AS caution,
            usager.date_carte AS date
     FROM usager
     NATURAL JOIN categorie
     ORDER BY usager.date_carte DESC";

$cards = $db->query($getCardsQuery)->get();

$colors = [];
$tempColors = [];
$availableColors = [
    'primary',
    'secondary',
    'success',
    'danger',
    'warning',
    'info'
];

$colors = [];
$colorIndex = 0;

foreach ($cards as $card) {
    $card = $card['card_id'];

    if (!isset($colors[$card])) {
        $colors[$card] = $availableColors[$colorIndex % count($availableColors)];
        $colorIndex++;
    }
}

view('admin/card/show.view.php', [
    'cards' => $cards,
    'colors' => $colors
]);