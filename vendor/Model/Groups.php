<?php

namespace Vendor\Model;

use Vendor\Core\Database\ActiveRecord;

class Groups
{
    use ActiveRecord;
    protected $table = 'groups';
    public $id;
    public $name;
    public $title;
    public $use;
    public $date_create;
    public $date_update;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Groups
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Groups
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * @return Groups
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUse()
    {
        return $this->use;
    }

    /**
     * @param mixed $use
     * @return Groups
     */
    public function setUse($use)
    {
        $this->use = $use;
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
     * @return Groups
     */
    public function setDateCreate($date_create)
    {
        $this->date_create = $date_create;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateUpdate()
    {
        return $this->date_update;
    }

    /**
     * @param mixed $date_update
     * @return Groups
     */
    public function setDateUpdate($date_update)
    {
        $this->date_update = $date_update;
        return $this;
    }

}