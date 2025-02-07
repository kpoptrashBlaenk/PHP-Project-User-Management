<?php

use Core\App;
use Http\Forms\TicketForm;

$ticketId = $_POST['ticket_id'];
$card_input = $_POST['card_input'];
$date_input = $_POST['date_input'];

$formAttributes = [
    'date' => $date_input
];

$form = TicketForm::validate($formAttributes);

$app = new App;
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

// Update ticket
$updateCardQuery =
    "UPDATE ticket
     SET ticket.id_carte = :card_id, ticket.date_achat = :date
     WHERE ticket.id_ticket = :ticket_id";

$db->query($updateCardQuery, [
    'ticket_id' => $ticketId,
    'card_id' => $card_input,
    'date' => $date_input
]);

redirect('/admin/ticket');