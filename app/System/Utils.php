<?php

class Utils
{
    public static function drawError()
    {
        if ($error = Session::get('error', true)) {
            echo
                '<div class="alert alert-danger" role="alert">'.
                _text($error).
                '</div>';
        }
    }

    public static function drawMessage()
    {
        if ($message = Session::get('message', true)) {
            echo
                '<div class="alert alert-success" role="alert">'.
                _text($message).
                '</div>';
        }
    }
}