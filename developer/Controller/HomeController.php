<?php

namespace Developer\Controller;

class HomeController extends DeveloperController
{
    public function index()
    {
        $this->view->render('dashboard',$this->data);
    }
}