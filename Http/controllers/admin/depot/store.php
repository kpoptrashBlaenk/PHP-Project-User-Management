<?php

use Core\App;
use Http\Forms\DepotForm;

$card_input = $_POST['card_input'];
$date_input = $_POST['date_input'];
$price_input = $_POST['price_input'];

$formAttributes = [
    'date' => $date_input,
    'price' => $price_input
];

$form = DepotForm::validate($formAttributes);

$app = new App();
$db = $app->getDB();

// Check card
$getCardQuery =
    "SELECT *
     FROM usager
     WHERE usager.id_carte = :card_id";

$card = $db->query($getCardQuery, [
    'card_id' => $card_input
])->find();

if (!$card) {
    $form::cardNotExists($formAttributes);
}

// Check depot
$getDepotQuery =
    "SELECT *
     FROM depot
     WHERE depot.id_carte = :card_id AND depot.date_depot = :depot_date";

$depot = $db->query($getDepotQuery, [
    'card_id' => $card_input,
    'depot_date' => $date_input
])->find();

if ($depot) {
    $form::depotExists($formAttributes);
}

// Insert
$insertDepotQuery =
    "INSERT INTO depot
     (depot.id_carte, depot.date_depot, depot.montant)
     VALUES (:card_id, :date, :price)";

$db->query($insertDepotQuery, [
    'card_id' => $card_input,
    'date' => $date_input,
    'price' => $price_input
]);

redirect('/admin/depot');