<?php

namespace Pub\Controller;

class HomeController extends PubController
{
    public function index()
    {
        //echo '<br>';
        //print_r($this->server->server);
        //echo '<br>';
        //print_r($this->session->session);
        //echo '<br>';
        $this->view->render('main',$this->data);
    }
}