<?php
$this->router->add('auth-index','/auth/','AuthController:signin');
$this->router->add('auth-signup','/auth/signup','AuthController:signup');
$this->router->add('auth-register','/auth/register','AuthController:register','POST');
$this->router->add('auth-auth','/auth/auth','AuthController:auth','POST');
$this->router->add('auth-logout','/auth/logout','AuthController:logout');