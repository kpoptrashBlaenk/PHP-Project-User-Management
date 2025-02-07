<?php

use Core\App;
use Http\Forms\TariffForm;

$prestationId = $_POST['prestation_id'];
$categoryId = $_POST['category_id'];
$prestation = $_POST['prestation'];
$category = $_POST['category'];
$price = $_POST['price'];

$app = new App;
$db = $app->getDB();

$form = TariffForm::validate([
    'price' => $price
]);

// $getTariffsQuery =
//     "SELECT tarif.id_prestation AS prestation_id,
//             tarif.id_categorie AS category_id,
//             prestation.type_prestation AS prestation,
//             categorie.libelle_categorie AS category,
//             tarif.prix AS price
//      FROM tarif
//      NATURAL JOIN prestation
//      NATURAL JOIN categorie
//      WHERE tarif.id_prestation = :prestation_id AND tarif.id_categorie = :category_id";

// $tariff = $db->query($getTariffsQuery, [
//     'prestation_id' => $prestation,
//     'category_id' => $category
// ])->find();

view('admin/tariff/edit.view.php', [
    // 'tariff' => $tariff
]);