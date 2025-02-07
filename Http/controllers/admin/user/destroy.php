<?php

use Core\App;

$userId = $_POST['user_id'];

$app = new App;
$db = $app->getDB();

$deleteCardQuery =
    "DELETE FROM users
     WHERE users.id_users = :user_id";

$tariff = $db->query($deleteCardQuery, [
    'user_id' => $userId
]);

redirect('/admin/user');