<?php

class Auth
{
    public static function login($username, $password)
    {
        if ($username === APP_USERNAME && $password === APP_PASSWORD) {
            Session::put('logged_in', APP_USERNAME);
            return true;
        }
        return false;
    }

    public static function check()
    {
        return isset($_SESSION['logged_in']);
    }

    public static function logout()
    {
        Session::clear('logged_in');
    }
}