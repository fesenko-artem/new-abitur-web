<?php

namespace Developer\ModelRepository;

use Vendor\Model;
use Vendor\Model\EnvironmentAccess;

class EnvironmentAccessRepository extends Model
{
    public function getEnvironmentAccessGroupsByEnvId($environment_id)
    {
        $environment_access_list = new EnvironmentAccess;
        return $environment_access_list->findall_by_conditions('environment_id',$environment_id);
    }
}