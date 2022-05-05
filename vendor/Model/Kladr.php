<?php

namespace Vendor\Model;

use Vendor\Core\Database\ActiveRecord;

class Kladr
{
    use ActiveRecord;
    protected string $table='kladr';
    public int $level;
    public string $code_region;
    public string $code_area;
    public string $code_city;
    public string $code_location;
    public string $kladr_code;
    public string $kladr_addr;
    public string $kladr_name;
    public string $postcode;
    public string $alt_name;
    public string $relevance;
    public function getLevel(): int
    {
        return $this->level;
    }
    public function setLevel(int $level): void
    {
        $this->level = $level;
    }
    public function getCodeRegion(): string
    {
        return $this->code_region;
    }
    public function setCodeRegion(string $code_region): void
    {
        $this->code_region = $code_region;
    }
    public function getCodeArea(): string
    {
        return $this->code_area;
    }
    public function setCodeArea(string $code_area): void
    {
        $this->code_area = $code_area;
    }
    public function getCodeCity(): string
    {
        return $this->code_city;
    }
    public function setCodeCity(string $code_city): void
    {
        $this->code_city = $code_city;
    }
    public function getCodeLocation(): string
    {
        return $this->code_location;
    }
    public function setCodeLocation(string $code_location): void
    {
        $this->code_location = $code_location;
    }
    public function getKladrCode(): string
    {
        return $this->kladr_code;
    }
    public function setKladrCode(string $kladr_code): void
    {
        $this->kladr_code = $kladr_code;
    }
    public function getKladrAddr(): string
    {
        return $this->kladr_addr;
    }
    public function setKladrAddr(string $kladr_addr): void
    {
        $this->kladr_addr = $kladr_addr;
    }
    public function getKladrName(): string
    {
        return $this->kladr_name;
    }
    public function setKladrName(string $kladr_name): void
    {
        $this->kladr_name = $kladr_name;
    }
    public function getPostcode(): string
    {
        return $this->postcode;
    }
    public function setPostcode(string $postcode): void
    {
        $this->postcode = $postcode;
    }
    public function getAltName(): string
    {
        return $this->alt_name;
    }
    public function setAltName(string $alt_name): void
    {
        $this->alt_name = $alt_name;
    }
    public function getRelevance(): string
    {
        return $this->relevance;
    }
    public function setRelevance(string $relevance): void
    {
        $this->relevance = $relevance;
    }

}