<?php

use Core\App;
use Http\Forms\TicketForm;

$card_input = $_POST['card_input'];
$date_input = $_POST['date_input'];

$formAttributes = [
    'date' => $date_input
];

$form = TicketForm::validate($formAttributes);

$app = new App();
$db = $app->getDB();

// Check card
$getCardQuery =
    "SELECT *
     FROM usager
     WHERE usager.id_carte = :card_id";

$card = $db->query($getCardQuery, [
    'card_id' => $card_input
])->find();

if (!$card) {
    $form::cardNotExists($formAttributes);
}

// Get last inserted id
$lastIdQuery =
    "SELECT id_ticket AS id
     FROM ticket
     ORDER BY CAST(SUBSTRING(id_ticket, 2) AS UNSIGNED) DESC";

$lastId = $db->query($lastIdQuery)->find();

$newId = intval(substr($lastId['id'], 1)) + 1;
$ticketId = "C$newId";

// Insert
$insertTariffQuery =
    "INSERT INTO ticket
     (ticket.id_ticket, ticket.id_carte, ticket.date_achat)
     VALUES (:ticket_id, :card_id, :date)";

$db->query($insertTariffQuery, [
    'ticket_id' => $ticketId,
    'card_id' => $card_input,
    'date' => $date_input
]);

redirect('/admin/ticket');