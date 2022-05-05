<?php

namespace Vendor\Model;

use Vendor\Core\Database\ActiveRecord;

class DictCountries
{
    use ActiveRecord;
    protected string $table = 'dict_countries';
    public int $id;
    public string $code;
    public string $description;
    public string $fullname;
    public int $abroad;
    public string $code_alpha2;
    public string $code_alpha3;
    public string $guid;
    public int $order_now;
    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function getCode(): string
    {
        return $this->code;
    }
    public function setCode(string $code): void
    {
        $this->code = $code;
    }
    public function getDescription(): string
    {
        return $this->description;
    }
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
    public function getFullname(): string
    {
        return $this->fullname;
    }
    public function setFullname(string $fullname): void
    {
        $this->fullname = $fullname;
    }
    public function getAbroad(): int
    {
        return $this->abroad;
    }
    public function setAbroad(int $abroad): void
    {
        $this->abroad = $abroad;
    }
    public function getCodeAlpha2(): string
    {
        return $this->code_alpha2;
    }
    public function setCodeAlpha2(string $code_alpha2): void
    {
        $this->code_alpha2 = $code_alpha2;
    }
    public function getCodeAlpha3(): string
    {
        return $this->code_alpha3;
    }
    public function setCodeAlpha3(string $code_alpha3): void
    {
        $this->code_alpha3 = $code_alpha3;
    }
    public function getGuid(): string
    {
        return $this->guid;
    }
    public function setGuid(string $guid): void
    {
        $this->guid = $guid;
    }
    public function getOrderNow(): int
    {
        return $this->order_now;
    }
    public function setOrderNow(int $order_now): void
    {
        $this->order_now = $order_now;
    }

}