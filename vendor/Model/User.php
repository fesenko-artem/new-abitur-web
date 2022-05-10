<?php

namespace Vendor\Model;

use Vendor\Core\Database\ActiveRecord;

class User
{
    use ActiveRecord;
    protected $table = 'user';
    public $id;
    public $email;
    public $login;
    public $password;
    public $locked;
    public $date_create;
    public $date_update;
    public $date_locked;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return User
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     * @return User
     */
    public function setLogin($login)
    {
        $this->login = $login;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLocked()
    {
        return $this->locked;
    }

    /**
     * @param mixed $locked
     * @return User
     */
    public function setLocked($locked)
    {
        $this->locked = $locked;
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
     * @return User
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
     * @return User
     */
    public function setDateUpdate($date_update)
    {
        $this->date_update = $date_update;
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
     * @return User
     */
    public function setDateLocked($date_locked)
    {
        $this->date_locked = $date_locked;
        return $this;
    }

}