<?php

namespace Vendor\Model;

use Vendor\Core\Database\ActiveRecord;

class EnvironmentAccess
{
    use ActiveRecord;
    protected $table = 'environment_access';
    public $id;
    public $group_id;
    public $environment_id;
    public $locked_flag;
    public $locked_description;
    public $date_locked;
    public $date_create;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return EnvironmentAccess
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGroupId()
    {
        return $this->group_id;
    }

    /**
     * @param mixed $group_id
     * @return EnvironmentAccess
     */
    public function setGroupId($group_id)
    {
        $this->group_id = $group_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEnvironmentId()
    {
        return $this->environment_id;
    }

    /**
     * @param mixed $environment_id
     * @return EnvironmentAccess
     */
    public function setEnvironmentId($environment_id)
    {
        $this->environment_id = $environment_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLockedFlag()
    {
        return $this->locked_flag;
    }

    /**
     * @param mixed $locked_flag
     * @return EnvironmentAccess
     */
    public function setLockedFlag($locked_flag)
    {
        $this->locked_flag = $locked_flag;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLockedDescription()
    {
        return $this->locked_description;
    }

    /**
     * @param mixed $locked_description
     * @return EnvironmentAccess
     */
    public function setLockedDescription($locked_description)
    {
        $this->locked_description = $locked_description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateLocked()
    {
        return $this->date_locked;
    }

    /**
     * @param mixed $date_locked
     * @return EnvironmentAccess
     */
    public function setDateLocked($date_locked)
    {
        $this->date_locked = $date_locked;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateCreate()
    {
        return $this->date_create;
    }

    /**
     * @param mixed $date_create
     * @return EnvironmentAccess
     */
    public function setDateCreate($date_create)
    {
        $this->date_create = $date_create;
        return $this;
    }
}