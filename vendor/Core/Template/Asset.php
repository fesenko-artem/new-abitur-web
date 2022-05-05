<?php


namespace Vendor\Core\Template;


class Asset
{
    const EXT_JS = '.js';
    const EXT_CSS = '.css';
    const EXT_LESS = '.less';
    const JS_SCRIPT_MASK = '<script src="%s" type="text/javascript"></script>';
    const CSS_LINK_MASK = '<link rel="stylesheet" href="%s">';
    public static $container = [];

    public static function css($link)
    {
        $file = Theme::getThemePath() . DS . $link . self::EXT_CSS;
        if (is_file($file)) {
            self::$container['css'][] = [
                'file' => Theme::getUrl() . '/' . $link . self::EXT_CSS
            ];
        }
    }
    public static function js(string $link)
    {
        $file = Theme::getThemePath() . DS . $link . self::EXT_JS;
        if (is_file($file)) {
            self::$container['js'][] = [
                'file' => Theme::getUrl() . '/' . $link . self::EXT_JS
            ];
        }
    }
    public static function render(string $extension)
    {
        $listAssets = isset(self::$container[$extension]) ? self::$container[$extension] : false;
        if ($listAssets) {
            $renderMethod = 'render' . ucfirst($extension);

            self::$renderMethod($listAssets);
        }
        return self::$container;
    }
    public static function renderJs(array $list)
    {
        foreach ($list as $item) {
            echo sprintf(
                self::JS_SCRIPT_MASK,
                $item['file']
            );
        }
    }
    public static function renderCss(array $list)
    {
        foreach ($list as $item) {
            echo sprintf(
                self::CSS_LINK_MASK,
                $item['file']
            );
        }
    }
}