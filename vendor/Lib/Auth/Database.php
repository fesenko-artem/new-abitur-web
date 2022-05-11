<?php

namespace Vendor\Lib\Auth;

use Vendor\Model\User;
use Vendor\Model\UserGroups;

class Database
{
    public $user_model;
    public $group_user_model;
    public $group_model;
    public $config;
    public function __construct($config)
    {
        $namespace = '\\Vendor\\Model\\';
        $user_namespace = $namespace. $config['auth.user_model'];
        $user_group_namespace = $namespace . $config['auth.user_groups_model'];
        $group_namespace = $namespace . $config['auth.group_model'];
        $this->config = $config;
        $this->user_model = new $user_namespace;
        $this->group_user_model = new $user_group_namespace;
        $this->group_model = new $group_namespace;
    }

    public function check($param_type,$param_value,$password)
    {
        $user = $this->user_model->find($param_type,$param_value);
        if ($user == null){
            return ['status'=>false];
        } elseif (!$this->verify_password($user->password,$password)){
            return ['status'=>false];
        } else{
            unset($user->password);
            return ['status'=>true,'data'=>['user_data'=>$user,'groups'=>$this->get_groups($this->group_user_model->findall_by_conditions('user_id',$user->id))]];
        }
    }

    public function get_groups($group_list)
    {
        $groups = [];
        foreach ($group_list as $key=>$value){
            $groups[] = $this->group_model->find('id',$value->group_id);
        }
        return $groups;
    }

    public function verify_password($user_pwd_hash,$inputed_pwd)
    {
        return password_verify($inputed_pwd,$user_pwd_hash);
    }
}