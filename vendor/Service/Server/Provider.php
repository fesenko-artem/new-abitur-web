<?php

namespace Vendor\Service\Server;

use Vendor\Core\Server\Server;
use Vendor\Service\AbstractProvider;

class Provider extends AbstractProvider
{
    public $serviceName = 'server';
    function init()
    {
        $server = new Server();
        $this->di->set($this->serviceName, $server);
    }
}