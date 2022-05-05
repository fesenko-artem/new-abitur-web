<?php

namespace Vendor\Service\Database;

use Vendor\Core\Database\Connection;
use Vendor\Core\Database\QueryBuilder;
use Vendor\Service\AbstractProvider;

class Provider extends AbstractProvider
{
    public $serviceName = 'db';
    function init()
    {
        $db = new Connection();
        $query = new QueryBuilder();
        $this->di->set($this->serviceName, $db);
        $this->serviceName = 'queryBuilder';
        $this->di->set($this->serviceName, $query);
    }
}