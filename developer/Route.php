<?php
$this->router->add('developer-index','/developer/','HomeController:index');
$this->router->add('environments-list','/developer/environments','EnvironmentsController:list');
$this->router->add('environment-info','/developer/environment/show/(id:int)','EnvironmentsController:show');
$this->router->add('environment-file','/developer/environment/file/(id:int)','EnvironmentsController:file');
$this->router->add('developer-api-get','/developer/api/(request_method:any)/(method:any)','DeveloperApiController:api');
$this->router->add('developer-api-post','/developer/api/(request_method:any)/(method:any)','DeveloperApiController:api','POST');
