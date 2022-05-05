<?php


namespace Vendor\Core\Template;


class Component
{
    public static function load($name, array $data = [])
    {
        $templateFile = ROOT_DIR . mb_strtolower(ENV) . DS . 'content/html/' . $name . '.php';
        if (is_file($templateFile)) {
            extract(array_merge($data, Theme::getData()));
            require($templateFile);
        } else {
            throw new \Exception(
                sprintf('View file %s does not exist!', $templateFile)
            );
        }
    }
    public static function load_block($name, array $data = [])
    {
        $templateFile = ROOT_DIR . 'content/block/' . $name . '.php';
        if (is_file($templateFile)) {
            extract(array_merge($data, Theme::getData()));
            require($templateFile);
        } else {
            throw new \Exception(
                sprintf('View file %s does not exist!', $templateFile)
            );
        }
    }
    
}