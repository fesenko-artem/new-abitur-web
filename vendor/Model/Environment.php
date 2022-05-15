<?php

namespace Vendor\Model;

use Vendor\Core\Database\ActiveRecord;

class Environment
{
    use ActiveRecord;
    protected $table = 'environment';
    public $id;
    public $path_dir;
    public $env_name;
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
     * @return Environment
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPathDir()
    {
        return $this->path_dir;
    }

    /**
     * @param mixed $path_dir
     * @return Environment
     */
    public function setPathDir($path_dir)
    {
        $this->path_dir = $path_dir;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEnvName()
    {
        return $this->env_name;
    }

    /**
     * @param mixed $env_name
     * @return Environment
     */
    public function setEnvName($env_name)
    {
        $this->env_name = $env_name;
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
     * @return Environment
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
     * @return Environment
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
     * @return Environment
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
     * @return Environment
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
     * @return Environment
     */
    public function setDateCreate($date_create)
    {
        $this->date_create = $date_create;
        return $this;
    }
}