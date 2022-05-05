<?php

namespace Vendor\Helper;

use Vendor\Core\Database\Connection;
use Vendor\Core\Database\QueryBuilder;

class ActiveDirectory
{
    protected $config;
    public $link;
    protected $user_data;
    public function __construct($config, $user_data)
    {
        $this->user_data = $user_data;
        set_error_handler(function ($errno, $errstr, $errfile, $errline){
            if (0 === error_reporting()) {
                return false;
            }
            throw new \ErrorException($errstr, 0, $errno, $errfile, $errline);
        },E_WARNING);
        $this->config = $config;
        $this->link = $this->connect($config);
        ldap_set_option($this->link, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($this->link, LDAP_OPT_REFERRALS, 0);
        try {
            ldap_bind($this->link, $this->user_data['login'].$this->config->mail_suffix, $this->user_data['password']);
        } catch (\Exception $e){
            $this->link = false;
        }

    }

    public function connect($config)
    {
        return ldap_connect($config->host,$config->port);
    }
    public function get_main_data()
    {
        if ($this->link == null){
            return null;
        }
        $ad_columns = [];
        $columns = null;
        if (isset($this->config->auth_config->comparison)){
            $columns = json_decode($this->config->auth_config->comparison);
            foreach ($columns as $key => $value){
                array_push($ad_columns,$key);
            }
        } else{
            array_push($ad_columns,'*');
        }
        $request =ldap_search($this->link, "{$this->config->auth_config->dc}", "({$this->config->auth_config->filter}{$this->user_data['login']})", $ad_columns);
        $data = ldap_get_entries($this->link, $request);
        ldap_unbind($this->link);
        $data = $data[0];
        $user_data = [];
        foreach ($data as $key=>$value){
            if (!is_int($key)){
                if (is_array($value) and $key != 'memberof'){
                    $user_data[$key] = $value[0];
                } elseif ($key == 'memberof'){
                    unset($value['count']);
                    $member = [];
                    foreach ($value as $k=>$v){
                        array_push($member,array_reverse(explode(',',$v)));
                    }
                    $user_data[$key] = $member;
                }elseif ($key = 'distinguishedname'){
                    $user_data[$key] = array_reverse(explode(',',$value));
                } else{
                    $user_data[$key] = $value;
                }
            }
        }
        //print_r($data);
        $data = [];
        foreach ($columns as $key => $value){
            $data[$value] = $user_data[$key];
        }
        try {
            if (isset($data['ad_structure'])){
                $data['ad_structure'] = $this->member_of($data['ad_structure']);
            }
        } catch (\Exception){
            unset($data['ad_structure']);
        }
        $data['login_plugin'] = 'LDAP';
        return (object) $data;
    }
    private function member_of($member_of)
    {
        $res_member = [];
        foreach ($member_of as $key => $value){
            $parent_id = 0;
            foreach ($value as $k => $v){
                $v = explode('=',$v);
                $z = $this->check_member($v[1],$v[0],$parent_id);
                if ($z == null){
                    $this->add_member($v[1],$v[0],$parent_id);
                    $z = $this->check_member($v[1],$v[0],$parent_id);
                }
                $parent_id = $z;
            }
            array_push($res_member,$parent_id);
        }
        return $res_member;
    }
    private function check_member($name,$type,$parent_id)
    {
        $queryBuilder = new QueryBuilder();
        $connection = new Connection();
        $query = $connection->query(
            $queryBuilder->
            select('id')->from('ad_structure')->where('name',$name)->where('type',$type)->where('parent_id',$parent_id)->sql(),
            $queryBuilder->values
        );
        if (count($query)== 0){
            return null;
        }
        return $query[0]->id;
    }
    private function add_member($name,$type,$parent_id)
    {
        $queryBuilder = new QueryBuilder();
        $connection = new Connection();
        $query = $connection->query(
            $queryBuilder->insert('ad_structure')->set(['name'=>$name,'type'=>$type,'parent_id'=>$parent_id])->sql(),
            $queryBuilder->values
        );
    }
}