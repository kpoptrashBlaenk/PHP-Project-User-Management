<?php

use Core\App;
use Http\Forms\CategoryForm;

$category = $_POST['category_input'];
$categoryId = $_POST['category_id'];

CategoryForm::validate([
    'category' => $category
]);

$app = new App;
$db = $app->getDB();

$updateTariffQuery =
    "UPDATE categorie
     SET categorie.libelle_categorie = :category
     WHERE categorie.id_categorie = :category_id";

$db->query($updateTariffQuery, [
    'category' => $category,
    'category_id' => $categoryId
]);

redirect('/admin/category');