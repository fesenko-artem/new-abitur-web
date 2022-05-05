<?php

namespace Vendor;

use Vendor\DI\DI;

class Controller
{
    protected $di;
    protected $data;
    public function __construct(DI $di)
    {
        $this->di = $di;
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