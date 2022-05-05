<?php

namespace Vendor\Model;

use Vendor\Core\Database\ActiveRecord;

class Passport
{
    use ActiveRecord;
    protected string $table = 'passport';
    public int $id;
    public int $id_user;
    public int $id_resume;
    public int $doc_type;
    public int $main;
    public string $series;
    public string $numb;
    public string $dt_issue;
    public string $unit_name;
    public string $unit_code;
    public string $dt_end;
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
    public function getDocType(): int
    {
        return $this->doc_type;
    }
    public function setDocType(int $doc_type): void
    {
        $this->doc_type = $doc_type;
    }
    public function getMain(): int
    {
        return $this->main;
    }
    public function setMain(int $main): void
    {
        $this->main = $main;
    }
    public function getSeries(): string
    {
        return $this->series;
    }
    public function setSeries(string $series): void
    {
        $this->series = $series;
    }
    public function getNumb(): string
    {
        return $this->numb;
    }
    public function setNumb(string $numb): void
    {
        $this->numb = $numb;
    }
    public function getDtIssue(): string
    {
        return $this->dt_issue;
    }
    public function setDtIssue(string $dt_issue): void
    {
        $this->dt_issue = $dt_issue;
    }
    public function getUnitName(): string
    {
        return $this->unit_name;
    }
    public function setUnitName(string $unit_name): void
    {
        $this->unit_name = $unit_name;
    }
    public function getUnitCode(): string
    {
        return $this->unit_code;
    }
    public function setUnitCode(string $unit_code): void
    {
        $this->unit_code = $unit_code;
    }
    public function getDtEnd(): string
    {
        return $this->dt_end;
    }
    public function setDtEnd(string $dt_end): void
    {
        $this->dt_end = $dt_end;
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