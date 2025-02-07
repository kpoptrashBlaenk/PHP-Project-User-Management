<?php

use Core\App;
use Http\Forms\PrestationForm;

$prestation = $_POST['prestation_input'];
$prestationId = $_POST['prestation_id'];

PrestationForm::validate([
    'prestation' => $prestation
]);

$app = new App;
$db = $app->getDB();

$updateTariffQuery =
    "UPDATE prestation
     SET prestation.type_prestation = :prestation
     WHERE prestation.id_prestation = :prestation_id";

$db->query($updateTariffQuery, [
    'prestation' => $prestation,
    'prestation_id' => $prestationId
]);

redirect('/admin/prestation');