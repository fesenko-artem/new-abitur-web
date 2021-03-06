<?php

namespace Vendor\Core\Request;

class Request
{
    public $get = [];
    public $post = [];
    public $request = [];
    public $cookie = [];
    public $session = [];
    public $files = [];
    public $server = [];
    public $environment = [];

    public function __construct()
    {
        $this->get = $_GET;
        $this->post = $_POST;
        $this->request = $_REQUEST;
        $this->cookie = $_COOKIE;
        $this->session = $_SESSION;
        $this->files = $_FILES;
        $this->server = $_SERVER;
        $this->environment = $_ENV;
    }

    public function redirect($url)
    {
        header(sprintf('Location: %s',$url));
        exit;
    }

    public function set_json_data_type()
    {
        header('Content-Type: application/json');
    }
}