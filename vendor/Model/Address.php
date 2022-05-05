<?php

namespace Vendor\Model;

use Vendor\Core\Database\ActiveRecord;

class Address
{
    use ActiveRecord;
    protected string $table = 'address';
    public int $id;
    public int $id_user;
    public int $id_resume;
    public int $id_country;
    public int $type;
    public int $kladr;
    public string $region_code;
    public string $region;
    public string $area_code;
    public string $area;
    public string $city_code;
    public string $city;
    public string $location_code;
    public string $location;
    public string $street_code;
    public string $street;
    public string $house;
    public string $building;
    public string $flat;
    public string $postcode;
    public string $adr;
    public string $dt_created;
    public string $dt_updated;
    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function getIdUser(): int
    {
        return $this->id_user;
    }
    public function setIdUser(int $id_user): void
    {
        $this->id_user = $id_user;
    }
    public function getIdResume(): int
    {
        return $this->id_resume;
    }
    public function setIdResume(int $id_resume): void
    {
        $this->id_resume = $id_resume;
    }
    public function getIdCountry(): int
    {
        return $this->id_country;
    }
    public function setIdCountry(int $id_country): void
    {
        $this->id_country = $id_country;
    }
    public function getType(): int
    {
        return $this->type;
    }
    public function setType(int $type): void
    {
        $this->type = $type;
    }
    public function getKladr(): int
    {
        return $this->kladr;
    }
    public function setKladr(int $kladr): void
    {
        $this->kladr = $kladr;
    }
    public function getRegionCode(): string
    {
        return $this->region_code;
    }
    public function setRegionCode(string $region_code): void
    {
        $this->region_code = $region_code;
    }
    public function getRegion(): string
    {
        return $this->region;
    }
    public function setRegion(string $region): void
    {
        $this->region = $region;
    }
    public function getAreaCode(): string
    {
        return $this->area_code;
    }
    public function setAreaCode(string $area_code): void
    {
        $this->area_code = $area_code;
    }
    public function getArea(): string
    {
        return $this->area;
    }
    public function setArea(string $area): void
    {
        $this->area = $area;
    }
    public function getCityCode(): string
    {
        return $this->city_code;
    }
    public function setCityCode(string $city_code): void
    {
        $this->city_code = $city_code;
    }
    public function getCity(): string
    {
        return $this->city;
    }
    public function setCity(string $city): void
    {
        $this->city = $city;
    }
    public function getLocationCode(): string
    {
        return $this->location_code;
    }
    public function setLocationCode(string $location_code): void
    {
        $this->location_code = $location_code;
    }
    public function getLocation(): string
    {
        return $this->location;
    }
    public function setLocation(string $location): void
    {
        $this->location = $location;
    }
    public function getStreetCode(): string
    {
        return $this->street_code;
    }
    public function setStreetCode(string $street_code): void
    {
        $this->street_code = $street_code;
    }
    public function getStreet(): string
    {
        return $this->street;
    }
    public function setStreet(string $street): void
    {
        $this->street = $street;
    }
    public function getHouse(): string
    {
        return $this->house;
    }
    public function setHouse(string $house): void
    {
        $this->house = $house;
    }
    public function getBuilding(): string
    {
        return $this->building;
    }
    public function setBuilding(string $building): void
    {
        $this->building = $building;
    }
    public function getFlat(): string
    {
        return $this->flat;
    }
    public function setFlat(string $flat): void
    {
        $this->flat = $flat;
    }
    public function getPostcode(): string
    {
        return $this->postcode;
    }
    public function setPostcode(string $postcode): void
    {
        $this->postcode = $postcode;
    }
    public function getAdr(): string
    {
        return $this->adr;
    }
    public function setAdr(string $adr): void
    {
        $this->adr = $adr;
    }
    public function getDtCreated(): string
    {
        return $this->dt_created;
    }
    public function setDtCreated(string $dt_created): void
    {
        $this->dt_created = $dt_created;
    }
    public function getDtUpdated(): string
    {
        return $this->dt_updated;
    }
    public function setDtUpdated(string $dt_updated): void
    {
        $this->dt_updated = $dt_updated;
    }


}