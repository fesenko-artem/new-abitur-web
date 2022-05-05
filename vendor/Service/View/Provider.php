<?php

namespace Vendor\Service\View;

use Vendor\Core\Template\View;
use Vendor\Service\AbstractProvider;

class Provider extends AbstractProvider
{
    public $serviceName = 'view';

    function init()
    {
        $view = new View($this->di);
        $this->di->set($this->serviceName, $view);
    }
}