<?php

namespace Developer\ModelRepository;

use Vendor\Model\Groups;

class GroupsRepository
{
    public function getGroup($id)
    {
        $group = new Groups($id);
        return $group->findOne();
    }
}