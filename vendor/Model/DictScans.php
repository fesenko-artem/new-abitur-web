<?php

namespace Vendor\Model;

use Vendor\Core\Database\ActiveRecord;

class DictScans
{
    use ActiveRecord;
    public string $table = 'dict_scans';
    public int $id;
    public int $id_doc;
    public int $numb;
    public string $scan_code;
    public string $scan_name;
    public int $required;
    public int $main;
    public string $doctype_1s;
    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function getIdDoc(): int
    {
        return $this->id_doc;
    }
    public function setIdDoc(int $id_doc): void
    {
        $this->id_doc = $id_doc;
    }
    public function getNumb(): int
    {
        return $this->numb;
    }
    public function setNumb(int $numb): void
    {
        $this->numb = $numb;
    }
    public function getScanCode(): string
    {
        return $this->scan_code;
    }
    public function setScanCode(string $scan_code): void
    {
        $this->scan_code = $scan_code;
    }
    public function getScanName(): string
    {
        return $this->scan_name;
    }
    public function setScanName(string $scan_name): void
    {
        $this->scan_name = $scan_name;
    }
    public function getRequired(): int
    {
        return $this->required;
    }
    public function setRequired(int $required): void
    {
        $this->required = $required;
    }
    public function getMain(): int
    {
        return $this->main;
    }
    public function setMain(int $main): void
    {
        $this->main = $main;
    }
    public function getDoctype1s(): string
    {
        return $this->doctype_1s;
    }
    public function setDoctype1s(string $doctype_1s): void
    {
        $this->doctype_1s = $doctype_1s;
    }
}