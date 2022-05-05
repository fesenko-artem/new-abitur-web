<?php

namespace Vendor\Service\CSRF;

use Vendor\Core\CSRF\CSRF;
use Vendor\Service\AbstractProvider;

class Provider extends AbstractProvider
{
    public $serviceName = 'csrf';
    function init()
    {
        $csrf = new CSRF();
        $this->di->set($this->serviceName, $csrf);
    }
}