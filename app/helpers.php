<?php

function _h(string $text)
{
    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}

function _e(string $text)
{
    echo _h($text);
}

function _url()
{
    $protocol = (
        !empty($_SERVER['HTTPS'])
        && $_SERVER['HTTPS'] !== 'off'
        || $_SERVER['SERVER_PORT'] == 443
    ) ? "https://" : "http://";
    return $protocol . $_SERVER['HTTP_HOST'] . '/';
}

function _redirect(string $uri)
{
    header('Location: ' . _url() . ltrim($uri, '/'));
}