<?php

function _h(string $text)
{
    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}

function _e(string $text)
{
    echo _h($text);
}

function _redirect(string $uri)
{
    $uri = substr($uri, 0, 1) === '/' ? $uri : '/'.$uri;
    header('Location: http://'.$_SERVER['HTTP_HOST'].$uri);
}