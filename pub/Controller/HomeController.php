<?php

namespace Pub\Controller;

class HomeController extends PubController
{
    public function index()
    {
        $this->view->render('main',$this->data);
    }
}