<?php

namespace Vendor\Model;

use Vendor\Core\Database\ActiveRecord;

class Contacts
{
    use ActiveRecord;
    protected string $table = 'contacts';
    public int $id;
    public int $id_user;
    public int $id_resume;
    public int $type;
    public string $contact;
    public string $comment;
    public string $dt_created;
    public string $dt_updated;

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
    public function getIdResume(): int
    {
        return $this->id_resume;
    }

    /**
     * @param int $id_resume
     */
    public function setIdResume(int $id_resume): void
    {
        $this->id_resume = $id_resume;
    }

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @param int $type
     */
    public function setType(int $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getContact(): string
    {
        return $this->contact;
    }

    /**
     * @param string $contact
     */
    public function setContact(string $contact): void
    {
        $this->contact = $contact;
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
    public function getDtUpdated(): string
    {
        return $this->dt_updated;
    }

    /**
     * @param string $dt_updated
     */
    public function setDtUpdated(string $dt_updated): void
    {
        $this->dt_updated = $dt_updated;
    }

}