<?php

namespace Vendor\Core\Session;

class Session
{
    public $session = [];
    public function __construct()
    {
        foreach ($_SESSION as $key => $value) {
            $this->set($key,$value);
        }
    }

    public function get($key)
    {
        return $this->has($key);
    }

    public function has($key)
    {
        return $this->session[$key] ?? null;
    }

    public function set($key,$value)
    {
        $this->session[$key] = $value;
        $this->update_session($this->session);
    }

    public function update_session($session)
    {
        $_SESSION = $session;
    }
    public function getKeys()
    {
        $keys = [];
        foreach ($this->session as $key => $value){
            $keys[] = $key;
        }
        return $keys;
    }

    public function check_session_integrity(array $session_key_list)
    {
        foreach ($session_key_list as $session_key=>$session_value){
            if(is_numeric($session_key)){
                if ($this->get($session_value) == null){
                    $this->set($session_value,null);
                }
            } else {
                if ($this->get($session_key) == null){
                    $this->set($session_key,$session_value);
                }
            }
        }
    }
}