<?php

namespace Pub\Controller;

use Vendor\Controller;
use Vendor\DI\DI;

class PubController extends Controller
{
    public function __construct(DI $di)
    {
        parent::__construct($di);
        $this->session->set('LAST_POSITION',$this->server->get('REQUEST_URI'));
    }
}