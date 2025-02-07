<?php

use Core\App;

$app = new App;
$db = $app->getDB();

$getTicketQuery =
    "SELECT ticket.id_ticket AS ticket_id,
            ticket.id_carte AS card_id,
            usager.nom AS name,
            categorie.libelle_categorie AS category,
            usager.montant_caution AS caution,
            usager.date_carte AS card_date,
            ticket.date_achat AS ticket_date
     FROM ticket
     NATURAL JOIN usager
     NATURAL JOIN categorie
     ORDER BY ticket.date_achat DESC";

$tickets = $db->query($getTicketQuery)->get();

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

foreach ($tickets as $ticket) {
    $ticket = $ticket['ticket_id'];

    if (!isset($colors[$ticket])) {
        $colors[$ticket] = $availableColors[$colorIndex % count($availableColors)];
        $colorIndex++;
    }
}

view('admin/ticket/show.view.php', [
    'tickets' => $tickets,
    'colors' => $colors
]);