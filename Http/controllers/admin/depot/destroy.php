<?php

use Core\App;

$cardId = $_POST['card_id'];
$date = $_POST['date'];

$app = new App;
$db = $app->getDB();

$deleteDepotQuery =
    "DELETE FROM depot
     WHERE depot.id_carte = :card_id AND depot.date_depot = :date";

$tariff = $db->query($deleteDepotQuery, [
    'card_id' => $cardId,
    'date' => $date
]);

redirect('/admin/depot');