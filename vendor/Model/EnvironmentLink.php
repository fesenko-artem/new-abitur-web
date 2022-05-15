<?php

namespace Vendor\Model;

use Vendor\Core\Database\ActiveRecord;

class EnvironmentLink
{
    use ActiveRecord;
    protected $table='environment_link';
    public $id;
    public $environment_id;
    public $link_name;
    public $title;
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
     * @return EnvironmentLink
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return EnvironmentLink
     */
    public function setEnvironmentId($environment_id)
    {
        $this->environment_id = $environment_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLinkName()
    {
        return $this->link_name;
    }

    /**
     * @param mixed $link_name
     * @return EnvironmentLink
     */
    public function setLinkName($link_name)
    {
        $this->link_name = $link_name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return EnvironmentLink
     */
    public function setTitle($title)
    {
        $this->title = $title;
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
     * @return EnvironmentLink
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
     * @return EnvironmentLink
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
     * @return EnvironmentLink
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
     * @return EnvironmentLink
     */
    public function setDateCreate($date_create)
    {
        $this->date_create = $date_create;
        return $this;
    }
}