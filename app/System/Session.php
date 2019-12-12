<?php

class Session
{
    public static function put(string $key, string $value)
    {
        $_SESSION[$key] = ($value);
    }

    public static function get(string $key, bool $forget = false)
    {
        $result = null;
        if (isset($_SESSION[$key])) {
            $result = $_SESSION[$key];
            if ($forget) {
                unset($_SESSION[$key]);
            }
        }
        return $result;
    }

    public static function clear(string $key)
    {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }
}