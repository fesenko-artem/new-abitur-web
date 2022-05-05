<?php

namespace Vendor\Model;

use Vendor\Core\Database\ActiveRecord;

class ResetPassword
{
    use ActiveRecord;
    protected string $table = 'reset_password';
    public int $id;
    public int $user_id;
    public string $reset_token;
    public string $date_create;
    public string $date_execute;
    public string $date_life;

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
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     */
    public function setUserId(int $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return string
     */
    public function getResetToken(): string
    {
        return $this->reset_token;
    }

    /**
     * @param string $reset_token
     */
    public function setResetToken(string $reset_token): void
    {
        $this->reset_token = $reset_token;
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
    public function getDateExecute(): string
    {
        return $this->date_execute;
    }

    /**
     * @param string $date_execute
     */
    public function setDateExecute(string $date_execute): void
    {
        $this->date_execute = $date_execute;
    }

    /**
     * @return string
     */
    public function getDateLife(): string
    {
        return $this->date_life;
    }

    /**
     * @param string $date_life
     */
    public function setDateLife(string $date_life): void
    {
        $this->date_life = $date_life;
    }
}