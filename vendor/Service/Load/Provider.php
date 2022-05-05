<?php


namespace Vendor\Service\Load;
use Vendor\Load;
use Vendor\Service\AbstractProvider;

class Provider extends AbstractProvider
{

    /**
     * @var string
     */
    public $serviceName = 'load';

    /**
     * @return mixed
     */
    public function init()
    {
        $load = new Load($this->di);

        $this->di->set($this->serviceName, $load);

        return $this;
    }
}