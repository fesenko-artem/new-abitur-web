<?php

namespace Vendor\Service\Auth;

use Vendor\Core\Auth\Auth;
use Vendor\Service\AbstractProvider;

class Provider extends AbstractProvider
{
    public $serviceName = 'auth';
    function init()
    {
        $auth = new Auth();
        $this->di->set($this->serviceName, $auth);
    }

}