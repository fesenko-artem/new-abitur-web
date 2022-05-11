<?php

namespace Developer\Controller;

use Vendor\Controller;
use Vendor\DI\DI;

class DeveloperController extends Controller
{
    protected $db;
    protected $config;
    protected $load;
    protected $queryBuilder;
    protected $view;
    protected $app_settings;
    protected $cache;
    protected $forms;
    protected $csrf;
    protected $auth;
    protected $data;
    protected $files;
    protected $datetime;
    public function __construct(DI $di)
    {
        parent::__construct($di);
        if ($this->session->get('AUTH') == 'N'){
            $this->request->redirect('/auth/');
        }
    }
}