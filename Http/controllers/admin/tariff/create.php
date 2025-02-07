<?php

use Core\App;

$errors = isset($_SESSION['_flashed']) ? $_SESSION['_flashed']['errors'] : [];
$old = isset($_SESSION['_flashed']) ? $_SESSION['_flashed']['old'] : [];

$app = new App;
$db = $app->getDB();

$getPrestationsQuery =
    "SELECT prestation.id_prestation AS prestation_id,
            prestation.type_prestation AS prestation
     FROM prestation";
$prestations = $db->query($getPrestationsQuery)->get();

$getCategoriesQuery =
    "SELECT categorie.id_categorie AS category_id,
        categorie.libelle_categorie AS category
 FROM categorie";
$categories = $db->query($getCategoriesQuery)->get();

view('admin/tariff/create.view.php', [
    'prestations' => $prestations,
    'categories' => $categories,
    'errors' => $errors,
    'old' => $old
]);