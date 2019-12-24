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
            call_user_func($function, $_GET);
        }
    }

    public static function post(string $route, callable $function)
    {
        self::$validPostRoutes[] = $route;

        $uri = strtok($_SERVER['REQUEST_URI'], '?');

        if ($uri == $route && $_SERVER['REQUEST_METHOD'] == 'POST') {
            call_user_func($function, $_POST);
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