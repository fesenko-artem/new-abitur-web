<?php

namespace Vendor\Service\Router;

use Vendor\Core\Config\Config;
use Vendor\Core\Router\Router;
use Vendor\Service\AbstractProvider;

class Provider extends AbstractProvider
{
    public $serviceName = 'router';
    function init()
    {   $main = Config::group('main');
        $router = new Router($this->di->get('app_settings')['app_url']);
        $this->di->set($this->serviceName, $router);
    }
}