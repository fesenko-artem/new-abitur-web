<?php

namespace Vendor\Core\Auth;

use Vendor\Core\Config\Config;
use Vendor\Helper\Session;
class Auth
{
    public $auth_config;
    public $auth_driver;
    public function __construct()
    {
        $this->auth_config = Config::group('Auth');
        $namespace = '\\Vendor\\Lib\\Auth\\'. $this->auth_config['auth.driver'];
        $this->auth_driver = new $namespace($this->auth_config);
    }

    public function auth($param_type,$param_value,$password)
    {
        $check = $this->auth_driver->check($param_type,$param_value,$password);
        if ($check['status']){
            $this->authorize($check['data']);
        }
        return $check;
    }

    public function authorize($data)
    {
        return $data;
    }

    public function unauthorize()
    {
        session_destroy();
        header('Location: /');
        exit;
    }
}