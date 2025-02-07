<?php

use Core\App;

$ticketId = $_POST['ticket_id'];

$app = new App;
$db = $app->getDB();

$deleteCardQuery =
    "DELETE FROM ticket
     WHERE ticket.id_ticket = :ticket_id";

$tariff = $db->query($deleteCardQuery, [
    'ticket_id' => $ticketId
]);

redirect('/admin/ticket');