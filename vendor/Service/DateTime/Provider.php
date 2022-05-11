<?php

namespace Vendor\Service\DateTime;

use Vendor\Core\DateTime\DateTime;
use Vendor\Service\AbstractProvider;

class Provider extends AbstractProvider
{
    public $serviceName = 'datetime';
    function init()
    {
        $datetime = new DateTime();
        $this->di->set($this->serviceName, $datetime);
    }
}