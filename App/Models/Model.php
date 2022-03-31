<?php

namespace App\Models;

use App\Db;
use App\DbException;

abstract class Model
{
    public const TABLE = '';

    public int $id;

    /**
     * Ищет все элементы таблици
     *
     * @param string $substitution - подстановки в запрос.
     * @return array - Массив объектов
     * @throws DbException
     */
//    public static function findAll(string $substitution = '')
//    {
//        $sql = 'SELECT * FROM ' . static::TABLE . ' ' . $substitution;
//        $db = new Db();
//        echo '<pre>';
////        var_dump($db->query($sql, static::class));
//        return $db->query($sql, static::class);
//    }


    public static function findAll(string $substitution = '')
    {
        $sql = 'SELECT * FROM ' . static::TABLE . ' ' . $substitution;
        $db = new Db();
        $data = [];
        foreach ($db->queryEach($sql, static::class) as $queryEach){
            $data[] = $queryEach;
        }
        return $data;
    }

    /**
     * Ищет элементы таблици по ID.
     *
     * @param int $id - ID по которому ищем запись
     * @return static - объект
     * @throws DbException - Если объект не найден - 404
     */
    public static function findById(int $id): static
    {

        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id = :id';
        $db = new Db();
        $result = $db->query($sql, static::class, [':id' => $id]);
        if (empty($result)) {
            throw new DbException('Ошибка 404 - не найдено!');
        }

        return $result[0];
    }

    /** Добавляет запись в таблицу
     *
     * @return void
     */
    public function insert(): void
    {
        $fields = get_object_vars($this);
        $cols = [];
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
     * Изменяет запись таблици
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
     * Сохраняет запись
     *
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
     * Удаляет запись
     *
     * @return void
     */
    public function delete(): void
    {
        $sql = 'DELETE FROM ' . static::TABLE . ' WHERE id = ' . $this->id;

        $db = new Db();
        $db->execute($sql);
    }

//    public function fill(array $data){
//        $thi->id =
//    }

}





