<?php

use Core\App;
use Http\Forms\DepotForm;

$cardId = $_POST['card_id'];
$date = $_POST['date'];
$card_input = $_POST['card_input'];
$date_input = $_POST['date_input'];
$price_input = $_POST['price_input'];

$formAttributes = [
    'date' => $date_input,
    'price' => $price_input
];

$form = DepotForm::validate($formAttributes);

$app = new App;
$db = $app->getDB();

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

// Update depot
$updateDepotQuery =
    "UPDATE depot
     SET depot.id_carte = :card_input, depot.date_depot = :date_input, depot.montant = :price_input
     WHERE depot.id_carte = :card_id AND depot.date_depot = :date AND depot.montant = :price";

$db->query($updateDepotQuery, [
    'card_input' => $card_input,
    'date_input' => $date_input,
    'price_input' => $price_input,
    'card_id' => $cardId,
    'date' => $date,
    'price' => $price
]);

redirect('/admin/depot');