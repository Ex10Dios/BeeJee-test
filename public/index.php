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

function __autoload($class_name)
{
    if (file_exists(APP_PATH."Controllers/$class_name.php")) {
        require_once APP_PATH."Controllers/$class_name.php";
    }
    if (file_exists(APP_PATH."Models/$class_name.php")) {
        require_once APP_PATH."Models/$class_name.php";
    }
    if (file_exists(APP_PATH."System/$class_name.php")) {
        require_once APP_PATH."System/$class_name.php";
    }
}

require_once APP_PATH.'helpers.php';
require_once APP_PATH.'routes.php';