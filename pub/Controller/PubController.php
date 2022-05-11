<?php

namespace Pub\Controller;

use Vendor\Controller;
use Vendor\DI\DI;

class PubController extends Controller
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
    }
}