<?php
$_SERVER['SERVER_PORT'] = 433;
$_SERVER['HTTP_HOST'] = $_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'];
$_SERVER['REQUEST_SCHEME'] = 'https';
require_once ROOT_DIR . 'vendor/autoload.php';
class_alias('Vendor\\Core\\Template\\Asset', 'Asset');
class_alias('Vendor\\Core\\Template\\Theme', 'Theme');
use Vendor\DI\DI;
use Vendor\Core\Config\Config;
use Vendor\System;

$di = new DI();
$di->set('app_settings', Config::group('main'));
switch ($di->get('app_settings')['app_mode']){
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
try {
    try {
        $di->set('session_settings', Config::group('session'));
        $session_settings = $di->get('session_settings');
        foreach ($session_settings as $session_setting=>$value){
            if($session_setting != 'base_session'){
                ini_set('session.'.$session_setting,$value);
            }

        }
        session_start();
    } catch (ErrorException $e){
        throw new Exception(
            sprintf(
                'Cannot start session, file settings <strong>%s</strong> does not exist.',
                ROOT_DIR . lcfirst(ENV) . DS . 'Config' . DS . 'Service.php'
            )
        );
    }
    try {
        $services = Config::group('service');
        foreach ($services as $service){
            $provider = new $service($di);
            $provider->init();
        }
    } catch (ErrorException $e){
        throw new Exception(
            sprintf(
                'Cannot load service list from file, file <strong>%s</strong> does not exist.',
                ROOT_DIR . lcfirst(ENV) . DS . 'Config' . DS . 'Service.php'
            )
        );
    }
    $di->set('model', []);
    $system = new System($di);
    $system->run();
} catch (Exception | ErrorException $e){
    if ($di->get('app_settings')['app_mode'] == 'developing') {
        echo $e->getMessage();
        echo '<br>';
        echo '<br>';
        echo sprintf('In file <strong>%s</strong>, line <strong>%s</strong>',$e->getFile(), $e->getLine());
        echo '<br>';
        echo '<br>';
        echo '<h3><strong>Trace</strong></h3>';
        foreach ($e->getTrace() as $item=>$value){
            $str = '';
            foreach ($value as $i=>$v){
                if (!is_array($v)) {
                    $str .= "<strong>$i</strong>" . ' => ' . $v . ' => ';
                } else {
                    $str .= "<strong>$i</strong>" . ' => ' . implode(' => ',$v) . ' ';
                }
            }
            $s = rtrim($str, '=> ');
            echo $s;
            echo '<br>';
        }
    }
}