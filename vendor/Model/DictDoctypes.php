<?php

namespace Vendor\Model;

use Vendor\Core\Database\ActiveRecord;

class DictDoctypes
{
    use ActiveRecord;
    protected string $table = 'dict_doctypes';
    public int $id;
    public int $isfolder;
    public string $parent_key;
    public string $code;
    public string $description;
    public string $guid;
    public int $doc_used;

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
    public function getIsfolder(): int
    {
        return $this->isfolder;
    }

    /**
     * @param int $isfolder
     */
    public function setIsfolder(int $isfolder): void
    {
        $this->isfolder = $isfolder;
    }

    /**
     * @return string
     */
    public function getParentKey(): string
    {
        return $this->parent_key;
    }

    /**
     * @param string $parent_key
     */
    public function setParentKey(string $parent_key): void
    {
        $this->parent_key = $parent_key;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
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
     * @return int
     */
    public function getDocUsed(): int
    {
        return $this->doc_used;
    }

    /**
     * @param int $doc_used
     */
    public function setDocUsed(int $doc_used): void
    {
        $this->doc_used = $doc_used;
    }
}