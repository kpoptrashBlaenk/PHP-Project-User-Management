<?php

use Core\App;

$prestationId = $_POST['prestation_id'];
$categoryId = $_POST['category_id'];

$app = new App;
$db = $app->getDB();

$deleteTariffQuery =
    "DELETE FROM tarif
     WHERE tarif.id_prestation = :prestation_id AND tarif.id_categorie = :category_id";

$tariff = $db->query($deleteTariffQuery, [
    'prestation_id' => $prestationId,
    'category_id' => $categoryId
]);

redirect('/admin/tariff');