<?php

namespace Vendor\Service\Config;

use Vendor\Core\Config\Config;
use Vendor\Service\AbstractProvider;

class Provider extends AbstractProvider
{
    public $serviceName = 'config';
    function init()
    {
        $config = new Config();
        $this->di->set($this->serviceName, $config);
    }
}