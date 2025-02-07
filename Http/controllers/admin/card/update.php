<?php

use Core\App;
use Http\Forms\CardForm;

$cardId = $_POST['card_id'];
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

$app = new App;
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

// Update card
$updateCardQuery =
    "UPDATE usager
     SET usager.nom = :name, usager.id_categorie = :category_id, usager.montant_caution = :caution, usager.date_carte = :date
     WHERE usager.id_carte = :card_id";

$db->query($updateCardQuery, [
    'name' => $name_input,
    'category_id' => $category_input,
    'caution' => $caution_input,
    'date' => $date_input,
    'card_id' => $cardId
]);

redirect('/admin/card');