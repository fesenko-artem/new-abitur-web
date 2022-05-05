<?php

namespace Vendor\Core\Database;

use PDO;
use Vendor\Core\Config\Config;

class Connection
{
    private $link;
    public function __construct()
    {
        $this->connect();
    }
    private function connect()
    {
        try {
            $config = Config::group('database');
        }catch (\Exception $e){
            echo 'Database config file not found';
            exit;
        }
        $dsn = 'mysql:host=' . $config['host'] . ';charset='. $config['charset'] . ';port=' . $config['port'] . ';dbname=' . $config['dbname'];
        $this->link = new PDO($dsn, $config['username'], $config['password']);
        return $this;
    }

    public function execute($sql, $values = [])
    {
        $sth = $this->link->prepare($sql);
        return $sth->execute($values);
    }

    public function query($sql, $values = [], $statement = PDO::FETCH_OBJ)
    {
        $sth = $this->link->prepare($sql);
        $sth->execute($values);
        $result = $sth->fetchAll($statement);
        if ($result === false){
            return [];
        }
        return $result;
    }

    public function lastInsertId()
    {
        return $this->link->lastInsertId();
    }
}