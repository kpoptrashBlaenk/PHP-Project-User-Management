<?php

namespace Core;

class CookieHandler
{
    private $database;

    public function __construct()
    {
        $db = new App;
        $this->database = $db->getDB();
    }

    public function checkCookie(): array
    {
        $cookies = $_COOKIE['remember'];

        $query =
            "SELECT users.id_users, users.nom, users.prenom, users.mail, users.avatar, users.cookies, droits.libelle_droits
             FROM users
             NATURAL JOIN droits
             WHERE users.cookies = :cookies";

        $user = $this->database->query($query, [
            'cookies' => $cookies
        ])->find();

        return [
            'first_name' => $user['prenom'],
            'last_name' => $user['nom'],
            'email' => $user['nom'],
            'user_id' => $user['id_users'],
            'rights' => $user['libelle_droits']
        ];
    }

    public function saveCookie(): void
    {
        $cookies = bin2hex(random_bytes(16));

        $query = "UPDATE users SET cookies = :cookies WHERE mail = :email";

        $this->database->query($query, [
            'email' => $_POST['email_input'],
            'cookies' => $cookies
        ]);

        setcookie('remember', $cookies, time() + (60 * 60 * 24 * 30), '/');
    }

    public function deleteCookie(): void
    {
        $query = 'UPDATE users SET cookies = NULL WHERE id_users = :id';

        $this->database->query($query, [
            'id' => $_SESSION['user']['user_id']
        ]);

        setcookie('remember', '', time() - 3600, "/");
    }
}