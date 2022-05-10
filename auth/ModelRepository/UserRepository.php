<?php

namespace Auth\ModelRepository;

use Vendor\Model\User;

class UserRepository
{
    public function create($params)
    {
        if ($this->check($params) != null){
            return ['status'=>false,'data'=>$this->check($params)];
        }
        $user = new User();
        $user->setEmail($params['email']);
        $user->setLogin($params['login']);
        $user->setPassword(password_hash($params['password'],PASSWORD_DEFAULT));
        return ['status'=>true,'data'=>$user->save()];
    }

    public function check($params)
    {
        $errors = [];
        if (!isset($params['email'])){
            $errors['email'] = 'Поле email заполненно неверно';
        } elseif(!preg_match('/^[A-Za-z0-9\-\.\_]+@+[A-Za-z0-9]+.+$/',$params['email'])){
            $errors['email'] = 'Поле email заполненно неверно';
        }
        if (!isset($params['login'])){
            $errors['login'] = 'Поле логин заполненно неверно';
        } elseif (strlen($params['login']) < 5){
            $errors['login'] = 'Поле логин заполненно неверно';
        } elseif (!preg_match('/^[A-Za-z\d\-\_\.]+$/',$params['login'])){
            $errors['login'] = 'Поле логин заполненно неверно';
        }
        if (!isset($params['password'])){
            $errors['password'] = 'Поле пароль заполненно неверно1';
        } elseif (strlen($params['password']) < 8){
            $errors['password'] = 'Поле пароль заполненно неверно';
        } elseif (!preg_match('/[\!\@\#\$\%\^\&\*\(\)\+\=?\-\_\.]+/',$params['password'])){
            $errors['password'] = 'Поле пароль заполненно неверно2';
        } elseif (!preg_match('/[0-9]+/',$params['password'])){
            $errors['password'] = 'Поле пароль заполненно неверно3';
        } elseif (!preg_match('/[A-Z]+/',$params['password'])){
            $errors['password'] = 'Поле пароль заполненно неверно4';
        } elseif (!preg_match('/[a-z]+/',$params['password'])){
            $errors['password'] = 'Поле пароль заполненно неверно5';
        }
        if (!isset($params['re_password'])){
            $errors['password'] = 'Поле подтверждение пароля заполненно неверно1';
        } elseif (strlen($params['re_password']) < 8){
            $errors['re_password'] = 'Поле подтверждение пароля заполненно неверно2';
        } elseif (!preg_match('/[\!\@\#\$\%\^\&\*\(\)\+\=?\-\_\.]+/',$params['re_password'])){
            $errors['re_password'] = 'Поле подтверждение пароля заполненно неверно3';
        } elseif (!preg_match('/[0-9]+/',$params['re_password'])){
            $errors['re_password'] = 'Поле подтверждение пароля заполненно неверно4';
        } elseif (!preg_match('/[A-Z]+/',$params['re_password'])){
            $errors['re_password'] = 'Поле подтверждение пароля заполненно неверно5';
        } elseif (!preg_match('/[a-z]+/',$params['re_password'])){
            $errors['re_password'] = 'Поле подтверждение пароля заполненно неверно6';
        } elseif ($params['re_password'] !== $params['password']){
            $errors['re_password'] = 'Поле подтверждение пароля заполненно неверно7';
        }
        $user = new User();
        if ($user->find('email',$params['email']) != null){
            $errors['email'] = 'Пользователь с таким email уже зарегистрирован';
        }
        if ($user->find('login',$params['login']) != null){
            $errors['login'] = 'Пользователь с таким логином уже зарегистрирован';
        }
        if (count($errors) != 0){
            return $errors;
        } else {
            return null;
        }
    }
}