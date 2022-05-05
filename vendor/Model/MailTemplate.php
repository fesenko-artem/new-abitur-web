<?php

namespace Vendor\Model;

use Vendor\Core\Database\ActiveRecord;

class MailTemplate
{
    use ActiveRecord;
    protected string $table = 'mail_template';
    public int $id;
    public string $type_name;
    public string $template;
    public string $date_create;
    public string $date_update;
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
    public function getTypeName(): string
    {
        return $this->type_name;
    }

    /**
     * @param string $type_name
     */
    public function setTypeName(string $type_name): void
    {
        $this->type_name = $type_name;
    }

    /**
     * @return string
     */
    public function getTemplate(): string
    {
        return $this->template;
    }

    /**
     * @param string $template
     */
    public function setTemplate(string $template): void
    {
        $this->template = $template;
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

}