<?php

namespace Vendor\Lib\Cache;

class Memcached
{
    public $memcache;
    public $types_cache;
    public function __construct($config)
    {
        $this->memcache = new \Memcached();
        foreach ($config['server_list'] as $server){
            $this->memcache->addServer($server[0],$server[1]);
        }
        $this->types_cache = $config['types_cache'];
    }
    public function getCacheServerList()
    {
        return $this->memcache->getServerList();
    }
    public function getAllKeys()
    {
        return $this->memcache->getAllKeys();
    }

    public function get($key,$private)
    {
        return $this->memcache->get($key.$private);
    }

    public function add($type, $name, $value, $private)
    {
        try {
            $key = Memcached . phpsprintf($this->types_cache[$type]['prefix'], $name);
            $this->memcache->add($key,$value,$this->types_cache[$type]['lifetime']);
            return $this->get($key,$private);
        } catch (\Exception $e){
            return false;
        }
    }
}