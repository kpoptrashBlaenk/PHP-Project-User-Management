<?php

use Core\App;

$errors = isset($_SESSION['_flashed']) ? $_SESSION['_flashed']['errors'] : [];
$old = isset($_SESSION['_flashed']) ? $_SESSION['_flashed']['old'] : [];

$userId = $_GET['user_id'];

$app = new App;
$db = $app->getDB();

// Get selected user
$getUsersQuery =
    "SELECT users.id_users AS user_id,
            users.nom AS last_name,
            users.prenom AS first_name,
            users.mail AS email,
            users.id_droits AS rights_id
     FROM users
     WHERE users.id_users = :user_id";

$user = $db->query($getUsersQuery, [
    'user_id' => $userId,
])->find();

// Get rights
$getRightsQuery =
    "SELECT droits.id_droits AS rights_id,
            droits.libelle_droits AS rights
     FROM droits";

$rights = $db->query($getRightsQuery)->get();

view('admin/user/edit.view.php', [
    'user' => $user,
    'rights' => $rights,
    'errors' => $errors,
    'old' => $old
]);