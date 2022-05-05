<?php

namespace Vendor\Model;

class Storage
{
    protected string $table = 'storage';
    public int $id;
    public int $id_user;
    public int $id_doc;
    public int $id_row;
    public int $id_scans;
    public string $path_scan;
    public string $file_name;
    public string $file_extension;
    public string $file_type;
    public int $file_size;
    public string $dt_created;

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
    public function getIdDoc(): int
    {
        return $this->id_doc;
    }

    /**
     * @param int $id_doc
     */
    public function setIdDoc(int $id_doc): void
    {
        $this->id_doc = $id_doc;
    }

    /**
     * @return int
     */
    public function getIdRow(): int
    {
        return $this->id_row;
    }

    /**
     * @param int $id_row
     */
    public function setIdRow(int $id_row): void
    {
        $this->id_row = $id_row;
    }

    /**
     * @return int
     */
    public function getIdScans(): int
    {
        return $this->id_scans;
    }

    /**
     * @param int $id_scans
     */
    public function setIdScans(int $id_scans): void
    {
        $this->id_scans = $id_scans;
    }

    /**
     * @return string
     */
    public function getPathScan(): string
    {
        return $this->path_scan;
    }

    /**
     * @param string $path_scan
     */
    public function setPathScan(string $path_scan): void
    {
        $this->path_scan = $path_scan;
    }

    /**
     * @return string
     */
    public function getFileName(): string
    {
        return $this->file_name;
    }

    /**
     * @param string $file_name
     */
    public function setFileName(string $file_name): void
    {
        $this->file_name = $file_name;
    }

    /**
     * @return string
     */
    public function getFileExtension(): string
    {
        return $this->file_extension;
    }

    /**
     * @param string $file_extension
     */
    public function setFileExtension(string $file_extension): void
    {
        $this->file_extension = $file_extension;
    }

    /**
     * @return string
     */
    public function getFileType(): string
    {
        return $this->file_type;
    }

    /**
     * @param string $file_type
     */
    public function setFileType(string $file_type): void
    {
        $this->file_type = $file_type;
    }

    /**
     * @return int
     */
    public function getFileSize(): int
    {
        return $this->file_size;
    }

    /**
     * @param int $file_size
     */
    public function setFileSize(int $file_size): void
    {
        $this->file_size = $file_size;
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

}