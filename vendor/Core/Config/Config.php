<?php

namespace Vendor\Core\Config;

use Exception;

class Config
{
    public static function item($key, $group='main')
    {
        if (!Repository::retrieve($group, $key)){
            self::file($group);
        }
        return Repository::retrieve($group, $key);
    }

    public static function group($group)
    {
        if (!Repository::retrieveGroup($group)){
            self::file($group);
        }
        return Repository::retrieveGroup($group);
    }

    /**
     * @param string $group
     * @return bool
     * @throws Exception
     */
    public static function file($group='main')
    {
        $path = ROOT_DIR . lcfirst(ENV) . DS . 'Config' . DS . ucfirst($group) . '.php';
        if (file_exists($path)){
            $items = include $path;
            if (is_array($items)){
                foreach ($items as $key=>$value){
                    Repository::store($group, $key, $value);
                }
                return true;
            } else {
                throw new \Exception(
                    sprintf(
                        'Config file <strong>%s</strong> is not valid array',
                        $path
                    )
                );
            }
        } else {
            $path = ROOT_DIR . 'vendor' . DS . 'Config' . DS . ucfirst($group) . '.php';
            if (file_exists($path)){
                $items = include $path;
                if (is_array($items)){
                    foreach ($items as $key=>$value){
                        Repository::store($group, $key, $value);
                    }
                    return true;
                } else {
                    throw new \Exception(
                        sprintf(
                            'Config file <strong>%s</strong> is not valid array',
                            $path
                        )
                    );
                }
            }else {
                throw new \Exception(
                    sprintf(
                        'Cannot load config from file, file <strong>%s</strong> does not exist.',
                        $path
                    )
                );
            }
        }
        return false;
    }
}