<?php

namespace Developer\ModelRepository;

use Vendor\Model;
use Vendor\Model\EnvironmentLink;

class EnvironmentLinkRepository extends Model
{
    public function getEnvironmentLinkByParam($column,$value)
    {
        $environment_links = new EnvironmentLink;
        return $environment_links->findall_by_cond([$column=>$value,'parent_id'=>0]);
    }
}