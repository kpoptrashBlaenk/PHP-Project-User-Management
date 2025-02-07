<?php

use Core\App;

$app = new App;
$db = $app->getDB();

$getPrestationsQuery =
    "SELECT prestation.id_prestation AS prestation_id,
            prestation.type_prestation AS prestation
     FROM prestation
     ORDER BY prestation";

$prestations = $db->query($getPrestationsQuery)->get();

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

foreach ($prestations as $prestation) {
    $prestation = $prestation['prestation'];

    if (!isset($colors[$prestation])) {
        $colors[$prestation] = $availableColors[$colorIndex % count($availableColors)];
        $colorIndex++;
    }
}

view('admin/prestation/show.view.php', [
    'prestations' => $prestations,
    'colors' => $colors
]);