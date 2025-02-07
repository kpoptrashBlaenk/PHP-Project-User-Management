<?php

use Core\App;

$errors = isset($_SESSION['_flashed']) ? $_SESSION['_flashed']['errors'] : [];
$old = isset($_SESSION['_flashed']) ? $_SESSION['_flashed']['old'] : [];

$card = $_GET['card_id'];
$date = $_GET['depot_date'];
$price = $_GET['price'];

$app = new App;
$db = $app->getDB();

// Get depot
$getDepotQuery =
    "SELECT depot.id_carte AS card_id,
            depot.date_depot AS date,
            depot.montant AS price
     FROM depot
     WHERE depot.id_carte = :card_id AND depot.date_depot = :date AND depot.montant = :price";

$depot = $db->query($getDepotQuery, [
    'card_id' => $card,
    'date' => $date,
    'price' => $price
])->find();

// Get cards
$getCardsQuery =
    "SELECT usager.id_carte AS card_id
     FROM usager";

$cards = $db->query($getCardsQuery)->get();

view('admin/depot/edit.view.php', [
    'depot' => $depot,
    'cards' => $cards,
    'errors' => $errors,
    'old' => $old
]);