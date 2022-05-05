<?php

namespace Vendor\Service\Session;

use Vendor\Core\Session\Session;
use Vendor\Service\AbstractProvider;

class Provider extends AbstractProvider
{
    public $serviceName = 'session';
    function init()
    {
        $session = new Session();
        $this->di->set($this->serviceName, $session);
    }
}