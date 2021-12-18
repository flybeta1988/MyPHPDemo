<?php
namespace App\Libs;

class Session
{
    const KEY_USER_PREFX = "user:";

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

    public static function getUserKey($uid) {
        return self::KEY_USER_PREFX. $uid;
    }
}