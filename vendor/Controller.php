<?php

namespace Vendor;

use Vendor\DI\DI;

class Controller
{
    protected $di;
    protected $session;
    protected $server;
    protected $config;
    protected $data;
    public function __construct(DI $di)
    {
        $this->di = $di;
        $this->server = $this->di->get('server');
        $this->session = $this->di->get('session');
        $this->config = $this->di->get('config');
    }
    public function __get($key)
    {
        return $this->di->get($key);
    }
    public function initVars()
    {
        $vars = array_keys(get_object_vars($this));

        foreach ($vars as $var) {
            if ($this->di->has($var)) {
                $this->{$var} = $this->di->get($var);
            }
        }

        return $this;
    }
}