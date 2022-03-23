<?php

namespace App\Models;

use App\Db;

abstract class Model
{
    public const TABLE = '';

    public int $id;

    /**
     * @param string $substitution
     * @return array
     */
    public static function findAll(string $substitution = ''): array
    {
        $sql = 'SELECT * FROM ' . static::TABLE . ' ' . $substitution;
        $db = new Db();
        return $db->query($sql, static::class, []);
    }

    /**
     * @param int $id
     * @return bool|static
     */
    public static function findById(int $id): static|bool
    {
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id =' . $id;
        $db = new Db();
        $result = $db->query($sql, static::class, []);
        if (empty($result)) {
            return false;
        }

        return $result[0];
    }

    /**
     * @return void
     */
    public function insert(): void
    {
        $fields = get_object_vars($this);
        $cosl = [];
        $data = [];

        foreach ($fields as $name => $value) {
            if ('id' === $name) {
                continue;
            }
            $cols[] = $name;
            $data[':' . $name] = $value;
        }

        $sql = 'INSERT INTO ' . static::TABLE . ' 
        (' . implode(',', $cols) . ') 
        VALUES 
        (' . implode(',', array_keys($data)) . ') ';

        $db = new Db();
        $db->execute($sql, $data);
        $this->id = $db->getLastID();
    }

    /**
     * @return void
     */
    public function update(): void
    {
        $fields = get_object_vars($this);
        $cols = [];
        $data = [];

        foreach ($fields as $name => $value) {
            if ('id' == $name) {
                continue;
            }
            $cols[] = $name . ' = ' . ':' . $name;
            $data[':' . $name] = $value;
        }

        $sql = 'UPDATE ' . static::TABLE . ' SET ' . implode(', ', $cols) .
            ' WHERE id = ' . $this->id;

        $db = new Db();
        $db->execute($sql, $data);

    }

    /**
     * @return void
     */
    public function save(): void
    {
        if (isset($this->id)) {
            $this->update();
        } else {
            $this->insert();
        }
    }

    /**
     * @return void
     */
    public function delete(): void
    {
        $sql = 'DELETE FROM ' . static::TABLE . ' WHERE id = ' . $this->id;

        $db = new Db();
        $db->execute($sql);
    }
}






