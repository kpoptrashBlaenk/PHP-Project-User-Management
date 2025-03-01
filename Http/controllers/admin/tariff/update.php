<?php

use Core\App;
use Http\Forms\TariffForm;

$prestationId = $_POST['prestation_id'];
$categoryId = $_POST['category_id'];
$price = $_POST['price_input'];

TariffForm::validate([
    'price' => $price
]);

$app = new App;
$db = $app->getDB();

$updateTariffQuery =
    "UPDATE tarif
     SET tarif.prix = :price
     WHERE tarif.id_prestation = :prestation_id AND tarif.id_categorie = :category_id";

$db->query($updateTariffQuery, [
    'price' => $price,
    'prestation_id' => $prestationId,
    'category_id' => $categoryId
]);

redirect('/admin/tariff');