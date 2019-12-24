<?php

class AuthController extends Controller
{
    public function getLogin(array $request)
    {
        include APP_PATH.'views/login.html.php';
    }

    public function auth(array $request)
    {
        if (Auth::login($request['username'], $request['password'])) {
            Session::put('message', 'Successfully logged in');
            _redirect('/');
        } else {
            Session::put('error', 'Invalid credentials');
            _redirect('/login');
        }

    }

    public function logout(array $request)
    {
        Auth::logout();
        Session::put('message', 'Successfully logged out');
        _redirect('/');
    }
}