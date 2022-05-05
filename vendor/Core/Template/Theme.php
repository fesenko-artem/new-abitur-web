<?php


namespace Vendor\Core\Template;

use JetBrains\PhpStorm\Pure;
use Vendor\Core\Config\Config;
use Vendor\Core\Request\Request;
use Vendor\Helper\HtmlHelper;

class Theme
{
    const RULES_NAME_FILE = [
        'header' => 'header-%s',
        'footer' => 'footer-%s',
        'sidebar' => 'sidebar-%s'
    ];
    protected static $url = '';
    protected static $data = [];
    public $asset;
    public $theme;
    public $html;

    public function __construct()
    {
        $this->asset = new Asset();
        $this->theme = $this;
    }

    public static function getUrl()
    {
        $baseUrl = Config::item('app_url', 'main');
        return sprintf('/%s', mb_strtolower(ENV).'/content');
    }
    public static function header($name = null, $data = [])
    {
        $name = (string) $name;
        $data['theme'] = Html::class;
        $file = self::detectNameFile($name, __FUNCTION__);

        Component::load($file,$data);
    }
    public static function footer($name = null,$data = [])
    {
        $name = (string) $name;
        $data['theme'] = Html::class;
        $file = self::detectNameFile($name, __FUNCTION__);

        Component::load($file,$data);
    }
    public static function sidebar($name = '', $data = [])
    {
        $name = (string) $name;
        $data['theme'] = Html::class;
        $file = self::detectNameFile($name, __FUNCTION__);

        Component::load($file, $data);
    }
    public static function block($name = '', $data = [])
    {
        $name = (string) $name;
        $data['theme'] = new HtmlComponent();
        if ($name !== '') {;
            Component::load_block($name, $data);
        }
    }

    /**
     * @param string $name
     * @param string $function
     * @return string
     */
    private static function detectNameFile(string $name, string $function): string
    {
        return empty(trim($name)) ? $function : sprintf(self::RULES_NAME_FILE[$function], $name);
    }

    /**
     * @return array
     */
    public static function getData(): array
    {
        return static::$data;
    }

    /**
     * @param array $data
     */
    public static function setData(array $data)
    {
        static::$data = $data;
    }

    /**
     * @return string
     */
    public static function getThemePath(): string
    {
        return ROOT_DIR . mb_strtolower(ENV) . DS . 'content';
    }
}