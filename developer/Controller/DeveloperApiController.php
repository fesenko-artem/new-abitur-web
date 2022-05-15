<?php

namespace Developer\Controller;

use Vendor\Controller;
use Vendor\DI\DI;

class DeveloperApiController extends Controller
{
    public function __construct(DI $di)
    {
        parent::__construct($di);
        $this->request->set_json_data_type();
        if ($this->session->get('AUTH') == 'N'){
            $this->result(['status'=>false,'msg'=>'un_authorize']);
            exit;
        }
        if (!$this->check_access_api()){
            $this->result(['status'=>false,'msg'=>'access_denied']);
            exit;
        }
    }
    public function result($data)
    {
        echo json_encode($data);
        exit;
    }
    public function check_access_api()
    {
        $this->load->model('Environment');
        $this->load->model('EnvironmentAccess');
        $this->data['current_environment'] = $this->model->environment->getEnvironmentByParam('env_name',mb_strtolower((ENV)));
        $this->data['roles_list'] = $this->model->environmentAccess->getEnvironmentAccessGroupsByEnvId($this->data['current_environment']->id);
        $status = false;
        foreach ($this->session->get('ROLE_LIST') as $role_key=>$role_value){
            foreach ($this->data['roles_list'] as $key=>$value){
                if ($role_value->id == $value->group_id){
                    $status = true;
                    break;
                }
            }
        }
        if (!$status){
            return false;
        }
        $this->load->model('EnvironmentLink');
        $this->data['environment_links'] = $this->model->environmentLink->getEnvironmentLinkByParam('environment_id',$this->data['current_environment']->id);
        return true;
    }

    public function api($request_method,$method)
    {
        $params = $this->request->$request_method;
        $this->$method($params);
    }

    public function read_file($params)
    {
        $this->data['list_path'] = ['params'=>['name'=>'path','type'=>'string','example'=>'path/to/dir']];
        if (!isset($params['path']) || $params['path'] ==='' || preg_match('/\.\/+/',$params['path']) || filetype(ROOT_DIR.DS.$params['path']) ==='dir'){
            $this->result(['status'=>false,'msg'=>'invalid_method','help'=>$this->data['list_path']]);
        }
        $file = file(ROOT_DIR.DS.$params['path']);
        $result = '';
        foreach ($file as $string){
            //$s = str_replace('\n','<br>',$string);
            //echo $string;
            $result .= str_replace('\n','',htmlentities($string));
        }
        $this->result(['status'=>true,'data'=>$result]);
    }

    public function list_path($params)
    {
        ini_set('display_errors',0);
        $this->data['list_path'] = ['params'=>['name'=>'path','type'=>'string','example'=>'path/to/dir']];
        if (!isset($params['path']) || $params['path'] ==='' || preg_match('/\.\/+/',$params['path'])){
            $this->result(['status'=>false,'msg'=>'invalid_method','help'=>$this->data['list_path'],'params'=>$params]);
        }
        $this->data['dir'] = [];
        $dir_list = scandir(ROOT_DIR.DS.$params['path'],SCANDIR_SORT_ASCENDING);
        if ($dir_list){
            foreach ($dir_list as $d_item){
                switch ($d_item){
                    case '..':
                    case '.':
                        break;
                    default:
                        $type = filetype(ROOT_DIR.DS.$params['path'].DS.$d_item);
                        $edited_date = date ("d-m-Y H:i:s.",filemtime(ROOT_DIR.DS.$params['path'].DS.$d_item));
                        $size = filesize(ROOT_DIR.DS.$params['path'].DS.$d_item);
                        $chmod = substr(sprintf('%o', fileperms(ROOT_DIR.DS.$params['path'].DS.$d_item)), -4);;
                        if (!isset($this->data['dir'][$type])){
                            $this->data['dir'][$type] = [];
                        }
                        $this->data['dir'][$type][$d_item] = [
                            'name'=>$d_item,
                            'type'=>$type,
                            'size'=>round($size/1024,2,PHP_ROUND_HALF_UP),
                            'modified'=>$edited_date,
                            'perms'=>$chmod,
                            'format'=>explode('.',$d_item)[count(explode('.',$d_item))-1]
                        ];
                        /*if ($this->data['dir'][$type][$d_item]['type'] === 'dir'){
                            $d = [];
                            $d['path'] = $params['path'].DS.$d_item;
                            $this->data['dir'][$type][$d_item]['children'] = self::list_path_static($d);
                        }*/
                        break;
                }
            }
        } else {
            $this->result(['status'=>false,'msg'=>'not_found','data'=>$params['path'].' not found']);
        }
        $this->result(['status'=>true,'data'=>$this->data['dir']]);
    }
    public function test($params)
    {
        $this->result(['status'=>true]);
    }

    public static function list_path_static($params)
    {
        $data['dir'] = [];
        $dir_list = scandir(ROOT_DIR.DS.$params['path'],SCANDIR_SORT_ASCENDING);
        if ($dir_list){
            foreach ($dir_list as $d_item){
                switch ($d_item){
                    case '..':
                    case '.':
                        break;
                    default:
                        $type = filetype(ROOT_DIR.DS.$params['path'].DS.$d_item);
                        $edited_date = date ("d-m-Y H:i:s.",filemtime(ROOT_DIR.DS.$params['path'].DS.$d_item));
                        $size = filesize(ROOT_DIR.DS.$params['path'].DS.$d_item);
                        $chmod = substr(sprintf('%o', fileperms(ROOT_DIR.DS.$params['path'].DS.$d_item)), -4);;
                        if (!isset($data['dir'][$type])){
                            $data['dir'][$type] = [];
                        }
                        $data['dir'][$type][$d_item] = [
                            'name'=>$d_item,
                            'type'=>$type,
                            'size'=>round($size/1024,2,PHP_ROUND_HALF_UP),
                            'modified'=>$edited_date,
                            'perms'=>$chmod
                        ];
                        if ($data['dir'][$type][$d_item]['type'] === 'dir'){
                            $d = [];
                            $d['path'] = $params['path'].DS.$d_item;
                            $data['dir'][$type][$d_item]['children'] = self::list_path_static($d);
                        }
                        break;
                }
            }return $data['dir'];
        }
    }
}