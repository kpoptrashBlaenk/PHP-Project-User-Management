<?php

use Core\App;

$errors = isset($_SESSION['_flashed']) ? $_SESSION['_flashed']['errors'] : [];
$old = isset($_SESSION['_flashed']) ? $_SESSION['_flashed']['old'] : [];

$ticketId = $_GET['ticket_id'];

$app = new App;
$db = $app->getDB();

// Get selected ticket
$getTicketQuery =
    "SELECT ticket.id_ticket AS ticket_id,
            ticket.id_carte AS card_id,
            ticket.date_achat AS date
     FROM ticket
     WHERE ticket.id_ticket = :ticket_id";

$ticket = $db->query($getTicketQuery, [
    'ticket_id' => $ticketId,
])->find();

// Get cards
$getCardsQuery =
    "SELECT usager.id_carte AS card_id
     FROM usager";

$cards = $db->query($getCardsQuery)->get();

view('admin/ticket/edit.view.php', [
    'ticket' => $ticket,
    'cards' => $cards,
    'errors' => $errors,
    'old' => $old
]);