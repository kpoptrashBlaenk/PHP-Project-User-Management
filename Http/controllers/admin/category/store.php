<?php

use Core\App;
use Http\Forms\CategoryForm;

$category_input = $_POST['category_input'];

$formAttributes = [
    'category' => $category_input
];

$form = CategoryForm::validate($formAttributes);

$app = new App();
$db = $app->getDB();

// Check category
$getCategoryQuery =
    "SELECT *
     FROM categorie
     WHERE categorie.libelle_categorie = :category";

$category = $db->query($getCategoryQuery, [
    'category' => $category_input
])->find();

if ($category) {
    $form::categoryExists($formAttributes);
}

// Insert
$insertTariffQuery =
    "INSERT INTO categorie
     (categorie.libelle_categorie)
     VALUES (:category)";

$db->query($insertTariffQuery, [
    'category' => $category_input,
]);

redirect('/admin/category');