<?php

use Core\App;

$errors = isset($_SESSION['_flashed']) ? $_SESSION['_flashed']['errors'] : [];
$old = isset($_SESSION['_flashed']) ? $_SESSION['_flashed']['old'] : [];

$category = $_GET['category_id'];

$app = new App;
$db = $app->getDB();

$getCategoryQuery =
    "SELECT categorie.id_categorie AS category_id,
            categorie.libelle_categorie AS category
     FROM categorie
     WHERE categorie.id_categorie = :category_id";

$category = $db->query($getCategoryQuery, [
    'category_id' => $category,
])->find();

view('admin/category/edit.view.php', [
    'category' => $category,
    'errors' => $errors,
    'old' => $old
]);