<?php

namespace Vendor\DI;

use http\Encoding\Stream;

class DI
{
    public array $container;
    public function get($key): mixed
    {
        return $this->has($key);
    }
    //
    public function set($key,$value): static
    {
        $this->container[$key] = $value;
        return $this;
    }

    public function has($key): mixed
    {
        return $this->container[$key] ?? null;
    }
}