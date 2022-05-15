<?php

namespace Developer\Controller;

use Vendor\Controller;
use Vendor\DI\DI;

class DeveloperController extends Controller
{
    public function __construct(DI $di)
    {
        parent::__construct($di);
        $this->session->set('LAST_POSITION',$this->server->get('REQUEST_URI'));
        if ($this->session->get('AUTH') == 'N'){
            $this->request->redirect('/auth/');
        }
        $this->check_access();
    }

    public function check_access()
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
            $this->request->redirect('/auth/');
            exit;
        }
        $this->load->model('EnvironmentLink');
        $this->data['environment_links'] = $this->model->environmentLink->getEnvironmentLinkByParam('environment_id',$this->data['current_environment']->id);
        return true;
    }
}