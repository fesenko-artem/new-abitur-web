<?php

namespace Developer\Controller;

use Vendor\DI\DI;

class EnvironmentsController extends DeveloperController
{
    public function __construct(DI $di)
    {
        parent::__construct($di);
        $this->data['links'] = [
            ['name'=>'Список приложений','url'=>'/developer/environments','active'=>''],
            ['name'=>'Создать приложение','url'=>'/developer/environments/create'],
            ['name'=>'Проверка целостности','url'=>'/developer/environments/check'],
            ['name'=>'Регистрация приложения','url'=>'/developer/environments/register'],
            ['name'=>'Обновление приложений','url'=>'/developer/environments/update']
        ];
    }

    public function list()
    {
        $this->load->model('Environment');
        $this->data['environments'] = $this->model->environment->getAllEnvironments();
        $this->view->render('environments/list',$this->data);
    }

    public function show($id)
    {
        $this->load->model('Environment');
        $this->load->model('EnvironmentAccess');
        $this->load->model('Groups');
        $this->data['environment'] = $this->model->environment->getEnvironment($id);
        $this->data['environment']->groups = $this->data['roles_list'] = $this->model->environmentAccess->getEnvironmentAccessGroupsByEnvId($this->data['environment']->id);
        foreach ($this->data['environment']->groups as $key=>$value){
            $this->data['environment']->groups[$key] = $this->model->groups->getGroup($value->group_id);
        }
        $this->data['links'] = [
            ['name'=>'Проверка целостности','url'=>'/developer/environment/check/'.$this->data['environment']->id],
            ['name'=>'Менеджер файлов','url'=>'/developer/environment/file/'.$this->data['environment']->id],
            ['name'=>'Обновление приложения','url'=>'/developer/environment/update/'.$this->data['environment']->id]
        ];
        $this->view->render('environments/show',$this->data);
    }
    public function file($id)
    {
        $this->load->model('Environment');
        $this->data['environment'] = $this->model->environment->getEnvironment($id);
        $this->data['links'] = [
            ['name'=>'Проверка целостности','url'=>'/developer/environment/check/'.$this->data['environment']->id],
            ['name'=>'Менеджер файлов','url'=>'/developer/environment/file/'.$this->data['environment']->id,'active'=>''],
            ['name'=>'Обновление приложения','url'=>'/developer/environment/update/'.$this->data['environment']->id]
        ];
        $this->view->render('environments/file',$this->data);
    }
}