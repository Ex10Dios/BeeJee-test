<?php

function _text(string $text)
{
    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}

function _textOut(string $text)
{
    echo _text($text);
}

function _redirect(string $uri)
{
    $uri = substr($uri, 0, 1) === '/' ? $uri : '/'.$uri;
    header('Location: http://'.$_SERVER['HTTP_HOST'].$uri);
}