<?php

namespace Vendor\Model;

use Vendor\Core\Database\ActiveRecord;

class ActivationUser
{
    use ActiveRecord;
    protected string $table = 'activation_user';
    public int $id;
    public string $user_id;
    public string $token;
    public string $date_create;
    public string $date_delete;

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
    public function getUserId(): string
    {
        return $this->user_id;
    }

    /**
     * @param string $user_id
     */
    public function setUserId(string $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @param string $token
     */
    public function setToken(string $token): void
    {
        $this->token = $token;
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

}