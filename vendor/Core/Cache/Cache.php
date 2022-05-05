<?php

namespace Vendor\Core\Cache;
use Vendor\Core\Config\Config;

class Cache
{
    public $cache;
    public function __construct()
    {
        $cache_config = Config::group('Cache');
        $cache_engine = ucfirst($cache_config['cache_engine']);
        $namespace = '\\Vendor\\Core\\Cache\\'.$cache_engine;
        $this->cache = new $namespace($cache_config);
    }

    public function getCacheServerList()
    {
        return $this->cache->getCacheServerList();
    }
    public function getAllKeys()
    {
        return $this->cache->getAllKeys();
    }

    public function get($key,$private='')
    {
        return $this->cache->get($key,$private='');
    }

    public function add($type, $name, $value, $private = '')
    {
        return $this->cache->add($type, $name, $value, $private = '');
    }
}