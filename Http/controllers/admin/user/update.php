<?php

use Core\App;
use Http\Forms\UserForm;

$userId = $_POST['user_id'];
$last_name_input = $_POST['last_name_input'];
$first_name_input = $_POST['first_name_input'];
$email_input = $_POST['email_input'];
$rights_input = $_POST['rights_input'];

$formAttributes = [
    'last_name' => $last_name_input,
    'first_name' => $first_name_input,
    'email' => $email_input,
];

$form = UserForm::validate($formAttributes);

$app = new App;
$db = $app->getDB();

// Check rights
$getRightQuery =
    "SELECT *
     FROM droits
     WHERE droits.id_droits = :rights_id";

$rights = $db->query($getRightQuery, [
    'rights_id' => $rights_input
])->find();

if (!$rights) {
    $form::rightsNotExists($formAttributes);
}

// Update user
$updateUserQuery =
    "UPDATE users
     SET users.nom = :last_name, users.prenom = :first_name, users.mail = :email, users.id_droits = :rights_id
     WHERE users.id_users = :user_id";

$db->query($updateUserQuery, [
    'last_name' => $last_name_input,
    'first_name' => $first_name_input,
    'email' => $email_input,
    'rights_id' => $rights_input,
    'user_id' => $userId
]);

redirect('/admin/user');