<?php

use Core\App;

$prestation = $_GET['prestation_id'];
$category = $_GET['category_id'];

$app = new App;
$db = $app->getDB();

$getTariffQuery =
    "SELECT tarif.id_prestation AS prestation_id,
            tarif.id_categorie AS category_id,
            prestation.type_prestation AS prestation,
            categorie.libelle_categorie AS category,
            tarif.prix AS price
     FROM tarif
     NATURAL JOIN prestation
     NATURAL JOIN categorie
     WHERE tarif.id_prestation = :prestation_id AND tarif.id_categorie = :category_id";

$tariff = $db->query($getTariffQuery, [
    'prestation_id' => $prestation,
    'category_id' => $category
])->find();

view('admin/tariff/edit.view.php', [
    'tariff' => $tariff,
]);