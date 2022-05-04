<?php
$_SERVER['SERVER_PORT'] = 433;
$_SERVER['HTTP_HOST'] = $_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'];
$_SERVER['REQUEST_SCHEME'] = 'https';
switch (ENV_TYPE){
    case 'developing':
        ini_set('error_reporting', E_ALL);
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        break;
    case 'production':
        ini_set('error_reporting', E_ALL);
        ini_set('display_errors', 0);
        ini_set('display_startup_errors', 0);
        break;
    default:
        break;
}
require_once ROOT_DIR . 'vendor/autoload.php';
use Vendor\DI\DI;