<?php

class AuthController extends Controller
{
    public function getLogin()
    {
        include APP_PATH.'views/login.html.php';
    }

    public function auth()
    {
        if (Auth::login($_REQUEST['username'], $_REQUEST['password'])) {
            Session::put('message', 'Successfully logged in');
            _redirect('/');
        } else {
            Session::put('error', 'Invalid credentials');
            _redirect('/login');
        }

    }

    public function logout()
    {
        Auth::logout();
        Session::put('message', 'Successfully logged out');
        _redirect('/');
    }
}