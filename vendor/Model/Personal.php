<?php

namespace Vendor\Model;

use Vendor\Core\Database\ActiveRecord;

class Personal
{
    use ActiveRecord;
    protected string $table = 'personal';
    public int $id;
    public int $id_user;
    public int $id_resume;
    public string $name_first;
    public string $name_middle;
    public string $name_last;
    public int $sex;
    public string $birth_dt;
    public string $birth_place;
    public int $citizenship;

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
     * @return string
     */
    public function getNameFirst(): string
    {
        return $this->name_first;
    }

    /**
     * @param string $name_first
     */
    public function setNameFirst(string $name_first): void
    {
        $this->name_first = $name_first;
    }

    /**
     * @return string
     */
    public function getNameMiddle(): string
    {
        return $this->name_middle;
    }

    /**
     * @param string $name_middle
     */
    public function setNameMiddle(string $name_middle): void
    {
        $this->name_middle = $name_middle;
    }

    /**
     * @return string
     */
    public function getNameLast(): string
    {
        return $this->name_last;
    }

    /**
     * @param string $name_last
     */
    public function setNameLast(string $name_last): void
    {
        $this->name_last = $name_last;
    }

    /**
     * @return int
     */
    public function getSex(): int
    {
        return $this->sex;
    }

    /**
     * @param int $sex
     */
    public function setSex(int $sex): void
    {
        $this->sex = $sex;
    }

    /**
     * @return string
     */
    public function getBirthDt(): string
    {
        return $this->birth_dt;
    }

    /**
     * @param string $birth_dt
     */
    public function setBirthDt(string $birth_dt): void
    {
        $this->birth_dt = $birth_dt;
    }

    /**
     * @return string
     */
    public function getBirthPlace(): string
    {
        return $this->birth_place;
    }

    /**
     * @param string $birth_place
     */
    public function setBirthPlace(string $birth_place): void
    {
        $this->birth_place = $birth_place;
    }

    /**
     * @return int
     */
    public function getCitizenship(): int
    {
        return $this->citizenship;
    }

    /**
     * @param int $citizenship
     */
    public function setCitizenship(int $citizenship): void
    {
        $this->citizenship = $citizenship;
    }

    /**
     * @return string
     */
    public function getInila(): string
    {
        return $this->inila;
    }

    /**
     * @param string $inila
     */
    public function setInila(string $inila): void
    {
        $this->inila = $inila;
    }

    /**
     * @return int
     */
    public function getBeneficiary(): int
    {
        return $this->beneficiary;
    }

    /**
     * @param int $beneficiary
     */
    public function setBeneficiary(int $beneficiary): void
    {
        $this->beneficiary = $beneficiary;
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

    /**
     * @return string
     */
    public function getGuid(): string
    {
        return $this->guid;
    }

    /**
     * @param string $guid
     */
    public function setGuid(string $guid): void
    {
        $this->guid = $guid;
    }

    /**
     * @return string
     */
    public function getCode1s(): string
    {
        return $this->code1s;
    }

    /**
     * @param string $code1s
     */
    public function setCode1s(string $code1s): void
    {
        $this->code1s = $code1s;
    }
    public string $inila;
    public int $beneficiary;
    public string $dt_created;
    public string $dt_updated;
    public string $guid;
    public string $code1s;
}