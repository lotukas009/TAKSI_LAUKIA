<?php

namespace Core;

use App\App;

/**
 * class for authentication
 *
 * Class Session
 * @package Core
 */
class Session
{
    private ?array $user = null;

    public function __construct()
    {
        $this->loginFromCookie();
    }

    /**
     * @return bool
     */
    public function loginFromCookie(): bool
    {
        if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
            $this->login($_SESSION['email'], $_SESSION['password']);
            return true;
        }

        return false;
    }

    /**
     * @param string $email
     * @param string $password
     * @return bool
     */
    public function login(string $email, string $password): bool
    {
        $user = App::$db->getRowWhere('users', ['email' => $email, 'password' => $password]);
        if ($user) {
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $this->user = $user;
            return true;
        }
        return false;
    }

    /**
     * @return array|null
     */
    public function getUser(): ?array
    {
        return $this->user;
    }

    /**
     * Logout user from site
     *
     * @param string|null $redirect
     */
    public function logout(string $redirect = null): void
    {
        setcookie('PHPSESSID', null, -1);
        session_destroy();
        $_SESSION = [];
        if ($redirect) {
            header("Location: $redirect");
            exit;
        }
    }
}