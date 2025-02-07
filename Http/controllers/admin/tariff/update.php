<?php

use Core\App;
use Http\Forms\TariffForm;

$prestationId = $_POST['prestation_id'];
$categoryId = $_POST['category_id'];
$price = $_POST['price_input'];

$app = new App;
$db = $app->getDB();

$form = TariffForm::validate([
    'price' => $price
]);

$updateTariffQuery =
    "UPDATE tarif
     SET tarif.prix = :price
     WHERE tarif.id_prestation = :prestation_id AND tarif.id_categorie = :category_id";

$tariff = $db->query($updateTariffQuery, [
    'price' => $price,
    'prestation_id' => $prestationId,
    'category_id' => $categoryId
])->find();

redirect('/admin/tariff');