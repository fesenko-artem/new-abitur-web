<?php

namespace Vendor\Model;

use Vendor\Core\Database\ActiveRecord;

class Resume
{
    use ActiveRecord;
    protected string $table = 'resume';
    public int $id;
    public int $id_user;
    public int $status;
    public int $app;
    public string $dt_created;
    public string $dt_approve;
    public int $id_approver;
    public string $comment;

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
    public function getIdUser(): int
    {
        return $this->id_user;
    }

    /**
     * @param int $id_user
     */
    public function setIdUser(int $id_user): void
    {
        $this->id_user = $id_user;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    /**
     * @return int
     */
    public function getApp(): int
    {
        return $this->app;
    }

    /**
     * @param int $app
     */
    public function setApp(int $app): void
    {
        $this->app = $app;
    }

    /**
     * @return string
     */
    public function getDtCreated(): string
    {
        return $this->dt_created;
    }

    /**
     * @param string $dt_created
     */
    public function setDtCreated(string $dt_created): void
    {
        $this->dt_created = $dt_created;
    }

    /**
     * @return string
     */
    public function getDtApprove(): string
    {
        return $this->dt_approve;
    }

    /**
     * @param string $dt_approve
     */
    public function setDtApprove(string $dt_approve): void
    {
        $this->dt_approve = $dt_approve;
    }

    /**
     * @return int
     */
    public function getIdApprover(): int
    {
        return $this->id_approver;
    }

    /**
     * @param int $id_approver
     */
    public function setIdApprover(int $id_approver): void
    {
        $this->id_approver = $id_approver;
    }

    /**
     * @return string
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     */
    public function setComment(string $comment): void
    {
        $this->comment = $comment;
    }

}