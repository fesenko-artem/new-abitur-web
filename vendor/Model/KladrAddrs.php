<?php

namespace Vendor\Model;

use Vendor\Core\Database\ActiveRecord;

class KladrAddrs
{
    use ActiveRecord;
    protected string $table = 'kladr_addrs';
    public int $addr_code;
    public string $addr_name;
    public int $level;
    public string $addr;
    public function getAddrCode(): int
    {
        return $this->addr_code;
    }
    public function setAddrCode(int $addr_code): void
    {
        $this->addr_code = $addr_code;
    }
    public function getAddrName(): string
    {
        return $this->addr_name;
    }
    public function setAddrName(string $addr_name): void
    {
        $this->addr_name = $addr_name;
    }
    public function getLevel(): int
    {
        return $this->level;
    }
    public function setLevel(int $level): void
    {
        $this->level = $level;
    }
    public function getAddr(): string
    {
        return $this->addr;
    }
    public function setAddr(string $addr): void
    {
        $this->addr = $addr;
    }

}