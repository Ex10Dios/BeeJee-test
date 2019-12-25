<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
session_start();

define('APP_PATH', __DIR__.'/../app/');
define('APP_USERNAME', 'admin');
define('APP_PASSWORD', '123');
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'bee_jee_tasks');

spl_autoload_register(function ($class_name) {
    $file = str_replace('\\', '/', $class_name). '.php';
    $path = __DIR__ . '/../' . $file;

    if (file_exists($path)) {
        include $path;
    } else {
        // Try to load system Class
        $path = APP_PATH . 'System/' . $file;
        if (file_exists($path)) {
            include $path;
        } else {
            throw new Exception("Unable to load ${file}");
        }
    }
});

require_once APP_PATH.'helpers.php';
require_once APP_PATH.'routes.php';