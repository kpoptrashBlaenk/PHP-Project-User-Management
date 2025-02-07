<?php

use Core\App;

$errors = isset($_SESSION['_flashed']) ? $_SESSION['_flashed']['errors'] : [];
$old = isset($_SESSION['_flashed']) ? $_SESSION['_flashed']['old'] : [];

$prestation = $_GET['prestation_id'];

$app = new App;
$db = $app->getDB();

$getPrestationQuery =
    "SELECT prestation.id_prestation AS prestation_id,
            prestation.type_prestation AS prestation
     FROM prestation
     WHERE prestation.id_prestation = :prestation_id";

$prestation = $db->query($getPrestationQuery, [
    'prestation_id' => $prestation,
])->find();

view('admin/prestation/edit.view.php', [
    'prestation' => $prestation,
    'errors' => $errors,
    'old' => $old
]);