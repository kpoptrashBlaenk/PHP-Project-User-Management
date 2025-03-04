<?php

use Core\App;

$app = new App;
$db = $app->getDB();

$getTariffsQuery =
    "SELECT tarif.id_prestation AS prestation_id,
            tarif.id_categorie AS category_id,
            prestation.type_prestation AS prestation,
            categorie.libelle_categorie AS category,
            tarif.prix AS price
     FROM tarif
     NATURAL JOIN prestation
     NATURAL JOIN categorie
     ORDER BY prestation";

$tariffs = $db->query($getTariffsQuery)->get();

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

foreach ($tariffs as $tariff) {
    $prestation = $tariff['prestation'];

    if (!isset($colors[$prestation])) {
        $colors[$prestation] = $availableColors[$colorIndex % count($availableColors)];
        $colorIndex++;
    }
}

view('admin/tariff/show.view.php', [
    'tariffs' => $tariffs,
    'colors' => $colors
]);