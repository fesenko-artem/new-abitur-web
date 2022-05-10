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
        $this->db = $this->di->get('db');
        $this->queryBuilder = $this->di->get('queryBuilder');
        $this->load = $this->di->get('load');
        $this->csrf = $this->di->get('csrf');
        $this->view = $this->di->get('view');
        $this->auth = $this->di->get('auth');
        $this->files = $this->di->get('files');
        $this->datetime = $this->di->get('datetime');
        $this->app_settings = $this->di->get('app_settings');
        $this->data['csrf'] = $this->csrf->setCSRF();
        $this->session->set('CSRF',$this->data['csrf']);
        $this->data['errors'] = [];
        $this->forms = $this->di->get('forms');
        $this->cache = $this->di->get('cache');
        $this->data['env'] = mb_strtolower(ENV);
        $this->data['current_domain'] = $this->request->server['SERVER_NAME'];
        $this->data['app_config'] = $this->config->group('main');
        $this->session->check_session_integrity($this->di->get('session_settings')['base_session']);
        $this->session->set('IP_ADDRESS',$this->server->get('REMOTE_ADDR'));
        $this->session->set('LAST_ACTIVITY',$this->datetime->get($this->datetime::DB_DATETIMESTAMP));
        if ($this->session->get('AUTH') == 'N'){
            $this->request->redirect('/auth/');
        }
    }
}