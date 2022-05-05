<?php

namespace Vendor\Model;

use Vendor\Core\Database\ActiveRecord;

class ShedullerTimeoutType
{
    use ActiveRecord;
    protected string $table = 'sheduller_timout_type';
    public int $id;
    public string $timeout_type_name;
    public string $title;
    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function getTimeoutTypeName(): string
    {
        return $this->timeout_type_name;
    }
    public function setTimeoutTypeName(string $timeout_type_name): void
    {
        $this->timeout_type_name = $timeout_type_name;
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