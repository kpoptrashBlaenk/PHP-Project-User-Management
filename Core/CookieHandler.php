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

    public function checkCookie()
    {
        $cookies = $_COOKIE['remember'];

        $query = "SELECT id_users, nom, prenom, mail, avatar, droits, cookies FROM users WHERE cookies = :cookies";

        return $this->database->query($query, [
            'cookies' => $cookies
        ])->find();
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