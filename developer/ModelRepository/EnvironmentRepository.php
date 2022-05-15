<?php

namespace Developer\ModelRepository;

use Vendor\Model;
use Vendor\Model\Environment;

class EnvironmentRepository extends Model
{
    public function getEnvironmentByParam($column,$value)
    {
        $environment = new Environment;
        return $environment->find($column,$value);
    }

    public function getAllEnvironments()
    {
        $environments = new Environment;
        return $environments->findall();
    }

    public function getEnvironment($id)
    {
        $environment = new Environment($id);
        return $environment->findOne();
    }
}