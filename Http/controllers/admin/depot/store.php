<?php

use Core\App;
use Http\Forms\TariffForm;

$prestationId = $_POST['prestation_input'];
$categoryId = $_POST['category_input'];
$price = $_POST['price_input'];

$formAttributes = [
    'price' => $price
];

$form = TariffForm::validate($formAttributes);

$app = new App();
$db = $app->getDB();

// Check prestation
$getPrestationQuery =
    "SELECT *
     FROM prestation
     WHERE prestation.id_prestation = :prestation_id";

$prestation = $db->query($getPrestationQuery, [
    'prestation_id' => $prestationId
])->find();

if (!$prestation) {
    $form::prestationNotExists($formAttributes);
}

// Check category
$getCategoryQuery =
    "SELECT *
     FROM categorie
     WHERE categorie.id_categorie = :category_id";

$category = $db->query($getCategoryQuery, [
    'category_id' => $categoryId
])->find();

if (!$category) {
    $form::categoryNotExists($formAttributes);
}

// Check tariff
$getTariffQuery =
    "SELECT *
     FROM tarif
     WHERE tarif.id_prestation = :prestation_id AND tarif.id_categorie = :category_id";

$tariff = $db->query($getTariffQuery, [
    'prestation_id' => $prestationId,
    'category_id' => $categoryId
])->find();

if ($tariff) {
    $form::tariffExists($formAttributes);
}

// Insert
$insertTariffQuery =
    "INSERT INTO tarif
     (tarif.id_prestation, tarif.id_categorie, tarif.prix)
     VALUES (:prestation_id, :category_id, :price)";

$db->query($insertTariffQuery, [
    'prestation_id' => $prestationId,
    'category_id' => $categoryId,
    'price' => $price
]);

redirect('/admin/tariff');