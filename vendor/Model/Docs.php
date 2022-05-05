<?php

namespace Vendor\Model;

use Vendor\Core\Database\ActiveRecord;

class Docs
{
    use ActiveRecord;
    protected string $table = 'docs';
    protected int $id;
    public string $doc_code;
    public string $doc_name;
    public string $table_name;
    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function getDocCode(): string
    {
        return $this->doc_code;
    }
    public function setDocCode(string $doc_code): void
    {
        $this->doc_code = $doc_code;
    }
    public function getDocName(): string
    {
        return $this->doc_name;
    }
    public function setDocName(string $doc_name): void
    {
        $this->doc_name = $doc_name;
    }
    public function getTableName(): string
    {
        return $this->table_name;
    }
    public function setTableName(string $table_name): void
    {
        $this->table_name = $table_name;
    }
}