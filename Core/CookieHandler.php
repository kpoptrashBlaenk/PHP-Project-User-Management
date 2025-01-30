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

    public function saveCookie(): void
    {
        $token = bin2hex(random_bytes(16));

        $query = "UPDATE users SET cookies = :cookies WHERE mail = :email";
        
        $this->database->query($query, [
            'email' => $_POST['email_input'],
            'cookies' => $token
        ]);

        setcookie('remember', $token, time() + (60 * 60 * 24 * 30), '/');
    }
}