<?php

namespace Vendor\Core\Database;
use \ReflectionClass;
use \ReflectionProperty;
trait ActiveRecord
{
    protected $db;
    protected $queryBuilder;
    public function __construct($id = 0)
    {
        global $di;

        $this->db           = $di->get('db');
        $this->queryBuilder = new QueryBuilder();

        if ($id) {
            $this->setId($id);
        }
    }
    public function getTable()
    {
        return $this->table;
    }
    public function findOne()
    {
        $find = $this->db->query(
            $this->queryBuilder
                ->select()
                ->from($this->getTable())
                ->where('id', $this->id)
                ->sql(),
            $this->queryBuilder->values
        );
        return isset($find[0]) ? $find[0] : null;
    }
    public function find($column,$value)
    {
        $find = $this->db->query(
            $this->queryBuilder
                ->select()
                ->from($this->getTable())
                ->where($column, $value)
                ->limit(1)
                ->sql(),
            $this->queryBuilder->values
        );

        return isset($find[0]) ? $find[0] : null;
    }
    public function findall_by_conditions($column,$value)
    {
        $find = $this->db->query(
            $this->queryBuilder
                ->select()
                ->from($this->getTable())
                ->where($column, $value)
                ->sql(),
            $this->queryBuilder->values
        );

        return $find ?? null;
    }
    public function findall_by_cond($params)
    {
        $this->queryBuilder->select()->from($this->getTable());
        foreach ($params as $key=>$value){
            $this->queryBuilder->where($key, $value);
        }
        $find = $this->db->query(
            $this->queryBuilder->sql(),
            $this->queryBuilder->values
        );

        return $find ?? null;
    }
    public function findlast($column,$value,$order_column,$order_type)
    {
        $findlast = $this->db->query(
            $this->queryBuilder
                ->select()
                ->from($this->getTable())
                ->where($column,$value)
                ->orderBy($order_column,$order_type)
                ->limit(1)
                ->sql(),
            $this->queryBuilder->values
        );
        return isset($findlast[0]) ? $findlast[0] : null;
    }
    public function findall()
    {
        $find = $this->db->query(
            $this->queryBuilder
                ->select()
                ->from($this->getTable())
                ->sql(),
            $this->queryBuilder->values
        );
        return $find ?? null;
    }
    public function save() {
        $properties = $this->getIssetProperties();

        try {
            if (isset($this->id)) {
                $this->db->execute(
                    $this->queryBuilder->update($this->getTable())
                        ->set($properties)
                        ->where('id', $this->id)
                        ->sql(),
                    $this->queryBuilder->values
                );
            } else {
                $this->db->execute(
                    $this->queryBuilder->insert($this->getTable())
                        ->set($properties)
                        ->sql(),
                    $this->queryBuilder->values
                );
            }
            return $this->db->lastInsertId();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
    public function delete() {
        try {
            if (isset($this->id)) {
                $this->db->execute(
                    $this->queryBuilder->delete()->from($this->getTable())
                        ->where('id', $this->id)
                        ->sql(),
                    $this->queryBuilder->values
                );
            }

            return "ID - {$this->id} has been delete from table - {$this->getTable()}";
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
    private function getIssetProperties()
    {
        $properties = [];

        foreach ($this->getProperties() as $key => $property) {
            if (isset($this->{$property->getName()})) {
                $properties[$property->getName()] = $this->{$property->getName()};
            }
        }

        return $properties;
    }
    private function getProperties()
    {
        $reflection = new ReflectionClass($this);
        $properties = $reflection->getProperties(ReflectionProperty::IS_PUBLIC);

        return $properties;
    }
}