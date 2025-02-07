<?php

use Core\App;

$cardId = $_POST['card_id'];

$app = new App;
$db = $app->getDB();

$deleteCardQuery =
    "DELETE FROM usager
     WHERE usager.id_carte = :card_id";

$tariff = $db->query($deleteCardQuery, [
    'card_id' => $cardId
]);

redirect('/admin/card');