<?php

namespace Vendor;

use Vendor\Core\Router\DispatchedRoute;
use Vendor\Helper\Common;
use Vendor\DI\DI;

class System
{
    private $di;
    public $router;
    public function __construct($di)
    {
        $this->di = $di;
        $this->router = $this->di->get('router');
    }

    public function run()
    {
        try {
            require_once ROOT_DIR . mb_strtolower(ENV) . DS . 'Route.php';
            $routerDispatch = $this->router->dispatch(Common::getMethod(), Common::getPathUrl());
            //Проверка роута на существование, если роута нет то перенапрвление на 404 страницу
            if ($routerDispatch == null) {
                $routerDispatch = new DispatchedRoute("ErrorController:page404");
            }
            //Получение контроллеров и методов из файла роутов
            list($class, $action) = explode(':', $routerDispatch->getController(), 2);
            //Подключение контроллеров
            $controller = '\\' . ENV . '\\Controller\\' . $class;
            $parameters = $routerDispatch->getParameters();
            call_user_func_array([new $controller($this->di), $action], $parameters);
        } catch (\ErrorException | Exception $e){
            if ($this->di->get('app_settings')['app_mode'] == 'developing') {
                echo $e->getMessage();
                echo '<br>';
                echo '<br>';
                echo sprintf('In file <strong>%s</strong>, line <strong>%s</strong>',$e->getFile(), $e->getLine());
                echo '<br>';
                echo '<br>';
                echo '<h3><strong>Trace</strong></h3>';
                foreach ($e->getTrace() as $item=>$value){
                    $str = '';
                    foreach ($value as $i=>$v){
                        if (!is_array($v)) {
                            $str .= "<strong>$i</strong>" . ' => ' . $v . ' => ';
                        } else {
                            $str .= "<strong>$i</strong>" . ' => ' . implode(' => ',$v) . ' ';
                        }
                    }
                    $s = rtrim($str, '=> ');
                    echo $s;
                    echo '<br>';
                }
            }
        }
    }
}