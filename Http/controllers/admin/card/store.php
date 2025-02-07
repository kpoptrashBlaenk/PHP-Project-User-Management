<?php

use Core\App;
use Http\Forms\CardForm;

$name_input = $_POST['name_input'];
$category_input = $_POST['category_input'];
$caution_input = $_POST['caution_input'];
$date_input = $_POST['date_input'];

$formAttributes = [
    'name' => $name_input,
    'caution' => $caution_input,
    'date' => $date_input
];

$form = CardForm::validate($formAttributes);

$app = new App();
$db = $app->getDB();

// Check category
$getCategoryQuery =
    "SELECT *
     FROM categorie
     WHERE categorie.id_categorie = :category";

$category = $db->query($getCategoryQuery, [
    'category' => $category_input
])->find();

if (!$category) {
    $form::categoryNotExists($formAttributes);
}

// Get last inserted id
$lastIdQuery =
    "SELECT id_carte AS id
     FROM usager
     ORDER BY CAST(SUBSTRING(id_carte, 2) AS UNSIGNED) DESC";
     
$lastId = $db->query($lastIdQuery)->find();

$newId = intval(substr($lastId['id'], 1)) + 1;
$cardId = "C$newId";

// Insert
$insertTariffQuery =
    "INSERT INTO usager
     (usager.id_carte, usager.nom, usager.id_categorie, usager.montant_caution, usager.date_carte)
     VALUES (:card_id, :name, :category_id, :caution, :date)";

$db->query($insertTariffQuery, [
    'card_id' => $cardId,
    'name' => $name_input,
    'category_id' => $category_input,
    'caution' => $caution_input,
    'date' => $date_input
]);

redirect('/admin/card');