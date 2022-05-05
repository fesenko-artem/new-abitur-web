<?php

namespace Vendor\Model;

use Vendor\Core\Database\ActiveRecord;

class Sheduller
{
    use ActiveRecord;
    protected string $table = 'sheduller';
    public int $id;
    public string $func;
    public string $desc;
    public int $timeout_value;
    public int $timeout_type_id;
    public string $last_start_datetime;
    public string $last_end_datetime;
    public string $next_start_datetime;
    public int $enabled;
    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function getFunc(): string
    {
        return $this->func;
    }
    public function setFunc(string $func): void
    {
        $this->func = $func;
    }
    public function getDesc(): string
    {
        return $this->desc;
    }
    public function setDesc(string $desc): void
    {
        $this->desc = $desc;
    }
    public function getTimeoutValue(): int
    {
        return $this->timeout_value;
    }
    public function setTimeoutValue(int $timeout_value): void
    {
        $this->timeout_value = $timeout_value;
    }
    public function getTimeoutTypeId(): int
    {
        return $this->timeout_type_id;
    }
    public function setTimeoutTypeId(int $timeout_type_id): void
    {
        $this->timeout_type_id = $timeout_type_id;
    }
    public function getLastStartDatetime(): string
    {
        return $this->last_start_datetime;
    }
    public function setLastStartDatetime(string $last_start_datetime): void
    {
        $this->last_start_datetime = $last_start_datetime;
    }
    public function getLastEndDatetime(): string
    {
        return $this->last_end_datetime;
    }
    public function setLastEndDatetime(string $last_end_datetime): void
    {
        $this->last_end_datetime = $last_end_datetime;
    }
    public function getNextStartDatetime(): string
    {
        return $this->next_start_datetime;
    }
    public function setNextStartDatetime(string $next_start_datetime): void
    {
        $this->next_start_datetime = $next_start_datetime;
    }
    public function getEnabled(): int
    {
        return $this->enabled;
    }
    public function setEnabled(int $enabled): void
    {
        $this->enabled = $enabled;
    }

}