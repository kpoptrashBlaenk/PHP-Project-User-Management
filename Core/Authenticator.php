<?php

namespace Core;

class Authenticator
{
    public function attempt(string $email, string $password): bool
    {
        $findUserQuery = "SELECT * FROM users WHERE mail = :email";

        $user = App::resolve(Database::class)->query($findUserQuery, [
            'email' => $email
        ])->find();

        if ($user && password_verify($password, $user['password'])) {
            $this->login([
                'first_name' => $user['prenom'],
                'last_name' => $user['nom'],
                'email' => $email,
                'user_id' => $user['id_users']
            ]);

            return true;
        }

        return false;
    }

    public function login($user): void
    {
        $_SESSION['user'] = $user;

        session_regenerate_id(true);
    }

    public function logout(): void
    {
        $cookies = new CookieHandler;
        $cookies->deleteCookie();

        Session::destroy();
    }
}