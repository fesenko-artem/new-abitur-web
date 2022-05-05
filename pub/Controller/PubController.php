<?php

namespace Pub\Controller;

use Vendor\Controller;
use Vendor\DI\DI;

class PubController extends Controller
{
    protected $db;
    protected $config;
    protected $request;
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
    public function __construct(DI $di)
    {
        parent::__construct($di);
        $this->request = $this->di->get('request');
        /*
        if($_SERVER['REQUEST_METHOD'] === 'GET' and !strpos($_SERVER['REQUEST_URI'],'content')) {
            $_SESSION['LAST_POSITION'] = $_SERVER['REQUEST_URI'];
        }
        $_SESSION['LAST_POSITION_TIME'] = date_format(date_create(),'Y-m-d\TG:i:s');
        if ($this->request->session['AUTH_STATUS'] == 'N' | !isset($this->request->session['AUTH_STATUS'])){
            header('Location: /auth');
            exit;
        }
        if ($this->request->session['user_data']->role->name === 'abiturient'){
            $this->data['user_data'] = $this->request->session['user_data'];
        }
        if ($this->request->session['user_data']->role->name === 'admin' & !isset($this->request->session['SHADOW'])){
            header('Location: /auth');
            exit;
        }
        if ($this->request->session['user_data']->role->name === 'admin' & isset($this->request->session['SHADOW'])){
            $this->data['user_data'] = $this->request->session['SHADOW'];
        }
        if ($this->request->session['user_data']->role->name === 'moderator' & !isset($this->request->session['SHADOW'])){
            header('Location: /auth');
            exit;
        }
        */
        $this->db = $this->di->get('db');
        $this->queryBuilder = $this->di->get('queryBuilder');
        $this->config = $this->di->get('config');
        $this->load = $this->di->get('load');
        $this->csrf = $this->di->get('csrf');
        $this->view = $this->di->get('view');
        $this->auth = $this->di->get('auth');
        $this->app_settings = $this->di->get('app_settings');
        $this->data['csrf'] = $this->csrf->setCSRF();
        $this->data['errors'] = [];
        $this->forms = $this->di->get('forms');
        $this->cache = $this->di->get('cache');
        $this->data['env'] = mb_strtolower(ENV);
        $this->data['current_domain'] = $this->request->server['SERVER_NAME'];
        $this->data['app_config'] = $this->config->group('main');
        $this->files = $this->di->get('files');
        /*
        if ($this->request->session['user_data']->role->name === 'moderator' & isset($this->request->session['SHADOW'])){
            $this->data['user_data'] = $this->request->session['SHADOW'];
        }
        */

    }
}