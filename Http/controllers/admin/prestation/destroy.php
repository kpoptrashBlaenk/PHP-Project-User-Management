<?php

use Core\App;

$prestationId = $_POST['prestation_id'];

$app = new App;
$db = $app->getDB();

$deletePrestationQuery =
    "DELETE FROM prestation
     WHERE prestation.id_prestation = :prestation_id";

$tariff = $db->query($deletePrestationQuery, [
    'prestation_id' => $prestationId
]);

redirect('/admin/prestation');