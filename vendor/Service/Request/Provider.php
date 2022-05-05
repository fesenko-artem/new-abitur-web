<?php

namespace Vendor\Service\Request;

use Vendor\Core\Request\Request;
use Vendor\Service\AbstractProvider;

class Provider extends AbstractProvider
{
    public $serviceName = 'request';
    function init()
    {
        $request = new Request();
        $this->di->set($this->serviceName, $request);
    }
}