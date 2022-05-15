<?php

namespace Auth\Controller;

use Vendor\Controller;
use Vendor\Core\Email\Email;
use Vendor\DI\DI;

class AuthController extends Controller
{

    public function __construct(DI $di)
    {
        parent::__construct($di);
        if ($this->session->get('AUTH') == 'Y'){
            $this->request->redirect($this->session->get('LAST_POSITION'));
        }
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

    public function logout()
    {
        return $this->auth->unauthorize();
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