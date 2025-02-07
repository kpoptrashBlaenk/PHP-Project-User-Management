<?php

use Core\App;

$categoryId = $_POST['category_id'];

$app = new App;
$db = $app->getDB();

$deleteCategoryQuery =
    "DELETE FROM categorie
     WHERE categorie.id_categorie = :category_id";

$tariff = $db->query($deleteCategoryQuery, [
    'category_id' => $categoryId
]);

redirect('/admin/category');