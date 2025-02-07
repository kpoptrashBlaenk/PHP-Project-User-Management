<?php

use Core\App;

$app = new App;
$db = $app->getDB();

$getCategoriesQuery =
    "SELECT categorie.id_categorie AS category_id,
            categorie.libelle_categorie AS category
     FROM categorie
     ORDER BY category";

$categories = $db->query($getCategoriesQuery)->get();

$colors = [];
$tempColors = [];
$availableColors = [
    'primary',
    'secondary',
    'success',
    'danger',
    'warning',
    'info'
];

$colors = [];
$colorIndex = 0;

foreach ($categories as $category) {
    $category = $category['category'];

    if (!isset($colors[$category])) {
        $colors[$category] = $availableColors[$colorIndex % count($availableColors)];
        $colorIndex++;
    }
}

view('admin/category/show.view.php', [
    'categories' => $categories,
    'colors' => $colors
]);