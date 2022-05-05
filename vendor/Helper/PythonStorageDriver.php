<?php

namespace Vendor\Helper;
use Vendor\Core\CSRF\CSRF;
class PythonStorageDriver
{
    private array $config;
    public mixed $storage_info;
    public bool $storage_status;
    public string $storage_path;
    public function __construct($config)
    {
        $this->new_name = new CSRF();
        $this->config = $config;
        $this->storage_status = $this->check_storage();
        if ($this->storage_status){
            $this->setStoragePath();
        }
    }
    public function check_storage(): bool
    {
        try {
            $params = ['token'=>$this->config['storage_token']];
            $storage_info = json_decode(file_get_contents($this->config['storage_url'],false,
                stream_context_create(['http' => ['method'  => 'POST', 'header'  => 'Content-type: application/x-www-form-urlencoded', 'content' => http_build_query($params)]])));
            if (isset($storage_info->err)){
                return false;
            }
            $this->storage_info = $storage_info;
            return true;
        } catch (\Exception $e){
            return false;
        }
    }
    public function getStoragePath(): string
    {
        return $this->storage_path;
    }
    public function setStoragePath(): void
    {
        $disk = '';
        foreach ($this->storage_info as $key=>$value)
        {
            $disk = $key;
            break;
        }
        $storage = $this->storage_info->$disk;
        $storage_path = sprintf("%s%s", ROOT_DIR, str_replace($_SERVER['DOCUMENT_ROOT'], '', $storage->parameters->mount_point));
        $this->storage_path = $storage_path;
    }
    public function save($file_object)
    {
        if (!isset($this->config['allowed_types'][$file_object->type])){
            $file_object->error = 100;
            return $file_object;
        } elseif ($file_object->size > $this->config['max_file_size'] * 1024 * 1024){
            $file_object->error = 200;
            return $file_object;
        }
        else {
            $extension = $this->config['allowed_types'][$file_object->type];
        }
        $file_object->name = $this->new_name->random_string(16);
        $file_object->extension = $extension;
        move_uploaded_file($file_object->tmp_name,$this->storage_path . DS . $file_object->name.'.'.$file_object->extension);
        return $file_object;
    }
    public function write_on_db()
    {

    }

}