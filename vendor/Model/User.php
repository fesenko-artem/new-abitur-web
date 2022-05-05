<?php

namespace Vendor\Model;

use Vendor\Core\Database\ActiveRecord;

class User
{
    use ActiveRecord;
    protected string $table = 'user';
    public int $id;
    public string $email;
    public string $guid;
    public int $role;
    public string $password;
    public string $hash;
    public string $date_create;
    public string $date_update;
    public string $date_delete;
    public string $activation_status;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getGuid(): string
    {
        return $this->guid;
    }

    /**
     * @param string $guid
     */
    public function setGuid(string $guid): void
    {
        $this->guid = $guid;
    }

    /**
     * @return int
     */
    public function getRole(): int
    {
        return $this->role;
    }

    /**
     * @param int $role
     */
    public function setRole(int $role): void
    {
        $this->role = $role;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getHash(): string
    {
        return $this->hash;
    }

    /**
     * @param string $hash
     */
    public function setHash(string $hash): void
    {
        $this->hash = $hash;
    }

    /**
     * @return string
     */
    public function getDateCreate(): string
    {
        return $this->date_create;
    }

    /**
     * @param string $date_create
     */
    public function setDateCreate(string $date_create): void
    {
        $this->date_create = $date_create;
    }

    /**
     * @return string
     */
    public function getDateUpdate(): string
    {
        return $this->date_update;
    }

    /**
     * @param string $date_update
     */
    public function setDateUpdate(string $date_update): void
    {
        $this->date_update = $date_update;
    }

    /**
     * @return string
     */
    public function getDateDelete(): string
    {
        return $this->date_delete;
    }

    /**
     * @param string $date_delete
     */
    public function setDateDelete(string $date_delete): void
    {
        $this->date_delete = $date_delete;
    }

    /**
     * @return string
     */
    public function getActivationStatus(): string
    {
        return $this->activation_status;
    }

    /**
     * @param string $activation_status
     */
    public function setActivationStatus(string $activation_status): void
    {
        $this->activation_status = $activation_status;
    }
}