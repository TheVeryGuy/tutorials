<?php

namespace App;

use Generator;
use PDO;

class Db
{
    protected PDO $dbh;

    public function __construct()
    {
        $config = (include __DIR__ . '/config.php')['db'];
        $this->dbh = new PDO(
            'mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'],
            $config['user'],
            $config['password']
        );
    }

    /**
     * Запрос к базе
     *
     * @param $sql - содержание запроса
     * @param $data - параметры запроса
     * @param $class - имя таблици
     * @return array - массив объектов
     * @throws DbException - некоректный запрос
     */
    public function query(string $sql, string $class, array $data = []): array
    {
        try {

            $sth = $this->dbh->prepare($sql);
            $sth->execute($data);
        } catch (\PDOException $error) {
            throw new DbException('Запрос не может быть выполнен!');
        }
        return $sth->fetchAll(PDO::FETCH_CLASS, $class);
    }


    /**
     * @param string $sql
     * @param string $className
     * @param array $data
     * @return Generator
     * @throws DbException
     */
    function queryEach(string $sql, string $className, array $data = []): Generator
    {
        $sth = $this->dbh->prepare($sql);
        $sth->setFetchMode(PDO::FETCH_CLASS, $className);
        try {
            $sth->execute($data);
        } catch (\PDOException $error) {
            throw new DbException('Запрос не может быть выполнен!');
        }
        for ($i = 0; $i < $sth->rowCount(); $i++) {
            yield $sth->fetch(PDO::FETCH_CLASS);
        }
    }


    /**
     * Запрос к БД
     *
     * @param string $query - запрос
     * @param array $params - параметры
     * @return bool
     */
    public
    function execute(string $query, array $params = []): bool
    {
        $sth = $this->dbh->prepare($query);

        return $sth->execute($params);
    }

    /**
     * Получает последний присвоенный ID
     *
     * @return int - ID
     */
    public
    function getLastID(): int
    {
        return $this->dbh->lastInsertId();
    }


}