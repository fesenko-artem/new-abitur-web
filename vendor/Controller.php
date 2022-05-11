<?php

namespace Vendor;

use Vendor\DI\DI;

class Controller
{
    protected $di;
    protected $session;
    protected $server;
    protected $request;
    protected $config;
    protected $db;
    protected $load;
    protected $queryBuilder;
    protected $view;
    protected $app_settings;
    protected $cache;
    protected $forms;
    protected $csrf;
    protected $auth;
    protected $files;
    protected $datetime;
    protected $data = [];

    public function __construct(DI $di)
    {
        $this->di = $di;
        $this->config = $this->di->get('config');
        $this->db = $this->di->get('db');
        $this->queryBuilder = $this->di->get('queryBuilder');
        $this->load = $this->di->get('load');
        $this->server = $this->di->get('server');
        $this->session = $this->di->get('session');
        $this->request = $this->di->get('request');
        $this->app_settings = $this->di->get('app_settings');
        $this->datetime = $this->di->get('datetime');
        $this->forms = $this->di->get('forms');
        $this->cache = $this->di->get('cache');
        $this->view = $this->di->get('view');
        $this->auth = $this->di->get('auth');
        $this->csrf = $this->di->get('csrf');
        $this->files = $this->di->get('files');
        $this->data['errors'] = [];
        $this->data['csrf'] = $this->csrf->setCSRF();
        $this->data['env'] = mb_strtolower(ENV);
        $this->data['current_domain'] = $this->request->server['SERVER_NAME'];
        $this->data['app_config'] = $this->config->group('main');
        $this->session->check_session_integrity($this->di->get('session_settings')['base_session']);
        $this->session->set('IP_ADDRESS',$this->server->get('REMOTE_ADDR'));
        $this->session->set('LAST_ACTIVITY',$this->datetime->get($this->datetime::DB_DATETIMESTAMP));

        $this->session->set('CSRF',$this->data['csrf']);

    }
    public function __get($key)
    {
        return $this->di->get($key);
    }
    public function initVars()
    {
        $vars = array_keys(get_object_vars($this));

        foreach ($vars as $var) {
            if ($this->di->has($var)) {
                $this->{$var} = $this->di->get($var);
            }
        }

        return $this;
    }
}