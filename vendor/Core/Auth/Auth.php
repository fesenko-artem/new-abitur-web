<?php

namespace Vendor\Core\Auth;

use Vendor\Core\Config\Config;
use Vendor\Helper\Session;
class Auth
{
    public function fill_base_session()
    {
        $_SESSION = [
            'AUTH_STATUS'=>'N',
            'LANG_CODE' => Config::item('app_lang','main'),
            'IP_ADDR' => $_SERVER['REMOTE_ADDR'],
        ];
        return $_SESSION;
    }
    public function update_base_session(array $session_new_data)
    {
        foreach ($session_new_data as $key => $value){
            $_SESSION[$key] = $value;
        }
        return true;
    }
    public function authorize($user_data)
    {
        Session::set('AUTH_STATUS','Y');
        Session::set('user_data', $user_data);
    }
    public function logout()
    {
        session_destroy();
        header('Location: /');
        exit;
    }
}