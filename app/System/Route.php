<?php

class Route
{
    public static $validGetRoutes = [];
    public static $validPostRoutes = [];

    public static function get(string $route, callable $function)
    {
        self::$validGetRoutes[] = $route;

        $uri = strtok($_SERVER['REQUEST_URI'], '?');

        if ($uri == $route && $_SERVER['REQUEST_METHOD'] == 'GET') {
            $function->__invoke();
        }
    }

    public static function post(string $route, callable $function)
    {
        self::$validPostRoutes[] = $route;

        $uri = strtok($_SERVER['REQUEST_URI'], '?');

        if ($uri == $route && $_SERVER['REQUEST_METHOD'] == 'POST') {
            $function->__invoke();
        }
    }

    public static function handleOtherRoutes()
    {
        $uri = strtok($_SERVER['REQUEST_URI'], '?');

        if (!in_array($uri, self::$validGetRoutes) && !in_array($uri, self::$validPostRoutes)) {
            include APP_PATH.'views/errors/404.html.php';
        }

    }
}