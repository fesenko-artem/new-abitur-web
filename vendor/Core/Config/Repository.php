<?php

namespace Vendor\Core\Config;

class Repository
{
    protected static $stored;

    /**
     * @param $group
     * @param $key
     * @param $data
     */
    public static function store($group, $key, $data)
    {
        if(!isset(static::$stored[$group]) || !is_array(static::$stored[$group])){
            static::$stored[$group] = [];
        }
        static::$stored[$group][$key] = $data;
    }

    /**
     * @param $group
     * @param $key
     * @return mixed
     */
    public static function retrieve($group, $key)
    {
        return static::$stored[$group][$key] ?? false;
    }

    /**
     * @param $group
     * @return mixed
     */
    public static function retrieveGroup($group)
    {
        return static::$stored[$group] ?? false;
    }
}