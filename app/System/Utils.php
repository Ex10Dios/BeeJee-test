<?php

class Utils
{
    public static function drawError()
    {
        if ($error = Session::get('error', true)) {
            echo
                '<div class="alert alert-danger" role="alert">'.
                _h($error).
                '</div>';
        }
    }

    public static function drawMessage()
    {
        if ($message = Session::get('message', true)) {
            echo
                '<div class="alert alert-success" role="alert">'.
                _h($message).
                '</div>';
        }
    }
}