<?php

namespace Vendor\Model;

use Vendor\Core\Database\ActiveRecord;

class Role
{
    use ActiveRecord;
    protected string $table = 'role';
    public int $id;
    public string $name;
    public string $title;
    public string $base_env;

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
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getBaseEnv(): string
    {
        return $this->base_env;
    }

    /**
     * @param string $base_env
     */
    public function setBaseEnv(string $base_env): void
    {
        $this->base_env = $base_env;
    }

}