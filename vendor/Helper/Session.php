<?php

namespace Vendor\Helper;

use JetBrains\PhpStorm\Pure;

class Session
{
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }
    #[Pure] public static function get($key): mixed
    {
        return Session::has($key);
    }
    public static function has($key): mixed
    {
        return $_SESSION[$key] ?? null;
    }
}