<?php


namespace Vendor\Core\Template;

use Vendor\Core\Cache\Cache;
use Vendor\DI\DI;
class View
{
    public $di;
    protected $theme;
    protected $setting;
    protected $menu;
    protected $cache;
    protected $cache_template_mask = 'memc.template.key-%s';
    public function __construct(DI $di)
    {
        $this->di      = $di;
        $this->theme   = new Theme();
        $this->cache = new Cache();
        //$this->setting = new Setting($di);
        //$this->menu    = new Menu($di);
    }
    public function render($template, $data = [])
    {
        $functions = ROOT_DIR.strtolower(ENV).'/functions.php';
        if (file_exists($functions)) {
            include_once $functions;
        }
        $templatePath = $this->getTemplatePath($template, ENV);
        if (!is_file($templatePath)) {
            throw new \InvalidArgumentException(
                sprintf('Template "%s" not found in "%s"', $template, $templatePath)
            );
        }
        //$tamplate_name = $templatePath .'|'.$_COOKIE['PHPSESSID'];
        //$file_template = $this->cache->get(sprintf($this->cache_template_mask,$tamplate_name));
        //if ($file_template == 0){
        //    $file_template = file_get_contents($templatePath);
        //    $this->cache->add('template',$tamplate_name, $file_template);
        //}
        //$data['lang'] = $this->di->get('language');

        $this->theme->setData($data);

        extract($data);
        ob_start();
        ob_implicit_flush(0);

        try {
            //var_export($file_template,true);
            require($templatePath);
        } catch (\Exception $e){
            ob_end_clean();
            throw $e;
        }
        echo ob_get_clean();

    }
    private function getTemplatePath($template, $env = null)
    {
        return ROOT_DIR . mb_strtolower(ENV) . '/content/html' . DS . $template . '.php';
    }
}