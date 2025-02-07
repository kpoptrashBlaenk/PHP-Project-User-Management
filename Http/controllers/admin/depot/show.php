<?php

use Core\App;

$app = new App;
$db = $app->getDB();

$getDepotQuery =
    "SELECT depot.id_carte AS card_id,
            usager.nom AS name,
            categorie.libelle_categorie AS category,
            usager.montant_caution AS caution,
            usager.date_carte AS card_date,
            depot.date_depot AS depot_date,
            depot.montant AS price
     FROM depot
     NATURAL JOIN usager
     NATURAL JOIN categorie
     ORDER BY CAST(SUBSTRING(depot.id_carte, 2) AS UNSIGNED)";

$depots = $db->query($getDepotQuery)->get();

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

foreach ($depots as $depot) {
    $depot = $depot['card_id'];

    if (!isset($colors[$depot])) {
        $colors[$depot] = $availableColors[$colorIndex % count($availableColors)];
        $colorIndex++;
    }
}

view('admin/depot/show.view.php', [
    'depots' => $depots,
    'colors' => $colors
]);