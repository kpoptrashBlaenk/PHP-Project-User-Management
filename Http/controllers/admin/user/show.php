<?php

use Core\App;

$app = new App;
$db = $app->getDB();

$getUsersQuery =
    "SELECT users.id_users AS user_id,
            users.nom AS last_name,
            users.prenom AS first_name,
            users.mail AS email,
            droits.libelle_droits AS rights
     FROM users
     NATURAL JOIN droits
     ORDER BY users.nom";

$users = $db->query($getUsersQuery)->get();

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

foreach ($users as $user) {
    $user = $user['user_id'];

    if (!isset($colors[$user])) {
        $colors[$user] = $availableColors[$colorIndex % count($availableColors)];
        $colorIndex++;
    }
}

view('admin/user/show.view.php', [
    'users' => $users,
    'colors' => $colors
]);