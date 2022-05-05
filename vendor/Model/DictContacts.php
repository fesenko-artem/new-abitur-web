<?php

namespace Vendor\Model;

use Vendor\Core\Database\ActiveRecord;

class DictContacts
{
    use ActiveRecord;
    protected string $table = 'dict_countries';
    public int $id;
    public string $title;
    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function getTitle(): string
    {
        return $this->title;
    }
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

}