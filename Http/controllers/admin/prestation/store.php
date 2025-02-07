<?php

use Core\App;
use Http\Forms\PrestationForm;

$prestation_input = $_POST['prestation_input'];

$formAttributes = [
    'prestation' => $prestation_input
];

$form = PrestationForm::validate($formAttributes);

$app = new App();
$db = $app->getDB();

// Check prestation
$getPrestationQuery =
    "SELECT *
     FROM prestation
     WHERE prestation.type_prestation = :prestation";

$prestation = $db->query($getPrestationQuery, [
    'prestation' => $prestation_input
])->find();

if ($prestation) {
    $form::prestationExists($formAttributes);
}

// Insert
$insertTariffQuery =
    "INSERT INTO prestation
     (prestation.type_prestation)
     VALUES (:prestation)";

$db->query($insertTariffQuery, [
    'prestation' => $prestation_input,
]);

redirect('/admin/prestation');