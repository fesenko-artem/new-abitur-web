<?php

namespace Vendor\Service\Cache;

use Vendor\Core\Cache\Cache;
use Vendor\Service\AbstractProvider;

class Provider extends AbstractProvider
{
   public $serviceName = 'cache';
    public function init()
    {
        $cache = new Cache();
        $this->di->set($this->serviceName, $cache);
    }
}