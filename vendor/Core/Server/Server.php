<?php

namespace Vendor\Core\Server;

class Server
{
    public $server = [];
    public function __construct()
    {
        foreach ($_SERVER as $key => $value) {
            $this->set($key,$value);
        }
    }

    public function get($key)
    {
        return $this->has($key);
    }

    public function has($key)
    {
        return $this->server[$key] ?? null;
    }

    public function set($key,$value)
    {
        $this->server[$key] = $value;
        $this->update_server($this->server);
    }

    public function update_server($server)
    {
        $_SERVER = $server;
    }
    public function getKeys()
    {
        $keys = [];
        foreach ($this->server as $key => $value){
            $keys[] = $key;
        }
        return $keys;
    }
}