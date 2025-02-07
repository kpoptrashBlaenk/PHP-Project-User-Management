<?php

use Core\App;

$errors = isset($_SESSION['_flashed']) ? $_SESSION['_flashed']['errors'] : [];
$old = isset($_SESSION['_flashed']) ? $_SESSION['_flashed']['old'] : [];

$app = new App;
$db = $app->getDB();

$getCategoriesQuery =
    "SELECT categorie.id_categorie AS category_id,
            categorie.libelle_categorie AS category
     FROM categorie";

$categories = $db->query($getCategoriesQuery)->get();

view('admin/card/create.view.php', [
    'categories' => $categories,
    'errors' => $errors,
    'old' => $old
]);