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
            return $this->authorize($check['data']);
        } else{
            return $check;
        }

    }

    public function authorize($data)
    {
        $session = new \Vendor\Core\Session\Session;
        $session->set('AUTH','Y');
        $session->set('EMAIL',$data['user_data']->email);
        $session->set('LOGIN',$data['user_data']->login);
        $session->set('DATE_REG',$data['user_data']->date_create);
        $session->set('EMAIL',$data['user_data']->email);
        $session->set('ROLE_LIST',$data['groups']);
        $session->set('AUTH_DRIVER',$this->auth_config['auth.driver']);

        return ['status'=>true,'data'=>$session->get('LAST_POSITION')];
    }

    public function unauthorize()
    {
        session_destroy();
        header('Location: /');
        exit;
    }
}