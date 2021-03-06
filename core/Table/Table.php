<?php

namespace Core\Table;

use Core\Database\Database;

class Table
{
    protected $table;
    protected $db;

    public function __construct(Database $db)
    {
        $this->db = $db;

        if ($this->table === NULL) {
            $parts = explode('\\', get_class($this));
            $class_name = end($parts);
            $this->table = strtolower(str_replace('Table', '', $class_name)) . 's';
        }
    }

    public function all()
    {
        return $this->query("SELECT * FROM {$this->table}");
    }

    public function find($id)
    {
        return $this->query("SELECT * FROM {$this->table}  WHERE id = ?", [$id], true);
    }

    public function update($id, $fields)
    {
        $sql_parts = [];
        $attributes = [];
        foreach ($fields as $k => $v) {
            $sql_parts[] = "$k = ?";
            $attributes[] = $v;
        }
        $attributes[] = $id;
        $sql_part = implode(', ', $sql_parts);
        return $this->query("UPDATE {$this->table} SET $sql_part WHERE id = ?", $attributes, true);
    }

    public function count($id)
    {
        return $this->query("SELECT COUNT(*) as total FROM {$this->table} WHERE id = ?", [$id], true);
    }

    public function delete($id)
    {
        return $this->query("DELETE FROM {$this->table} WHERE id = ?", [$id], true);
    }

    public function create($fields)
    {
        $sql_parts = [];
        $attributes = [];
        foreach ($fields as $k => $v) {
            $sql_parts[] = "$k = ?";
            $attributes[] = $v;
        }
        $sql_part = implode(', ', $sql_parts);
        return $this->query("INSERT INTO {$this->table} SET $sql_part", $attributes, true);
    }

    // function qui recupère tous les enregistrements et créé un tableau

    /**
     * @param $key
     * @param $value
     * @return array
     */
    public function listToArray($key, $value)
    {

        //$key = id
        //$value = title
        $key = 'get' . ucfirst($key);
        $value = 'get' . ucfirst($value);
        $records = $this->all();
        $return = [];
        foreach ($records as $k => $v) {
            $return[$v->$key()] = $v->$value();
        }

        return $return;

    }

    public function query($statement, $attributes = null, $one = false)
    {
        if ($attributes) {
            return $this->db->prepare($statement, $attributes, str_replace('Table', 'Entity', get_class($this)), $one);
        } else {
            return $this->db->query($statement, str_replace('Table', 'Entity', get_class($this)));
        }
    }
}