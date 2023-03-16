<?php
namespace App\Libs;

session_start();

class Session
{
    const LOGIN_USER_ID = "login_user_id";

    /**
     * @return mixed
     */
    public static function get($key)
    {
        return $_SESSION[$key] ?? '';
    }

    public static function set($key, $value): void
    {
        $_SESSION[$key] = $value;
    }

    public static function getUserKey() {
        return self::LOGIN_USER_ID;
    }
}