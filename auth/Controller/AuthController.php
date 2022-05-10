<?php

namespace Auth\Controller;

use Vendor\Controller;
use Vendor\Core\Email\Email;
use Vendor\DI\DI;

class AuthController extends Controller
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
    }

    public function signin()
    {
        $this->view->render('auth',$this->data);
    }

    public function auth()
    {
        $this->request->set_json_data_type();
        echo json_encode($this->auth->auth('email',$this->request->post['email'],$this->request->post['password']));
    }

    public function signup()
    {
        $this->view->render('signup',$this->data);
    }

    public function register()
    {
        $this->request->set_json_data_type();
        $this->load->model('User');
        echo json_encode($this->model->user->create($this->request->post));
    }

}