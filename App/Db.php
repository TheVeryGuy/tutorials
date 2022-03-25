<?php

namespace App;

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
     * @param $sql
     * @param $data
     * @param $class
     * @return array|false
     */
    public function query(string $sql, string $class, array $data = []): array
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($data);

        return $sth->fetchAll(PDO::FETCH_CLASS, $class);
    }

    /**
     * @param string $query
     * @param array $params
     * @return bool
     */
    public function execute(string $query, array $params = []): bool
    {
        $sth = $this->dbh->prepare($query);

        return $sth->execute($params);
    }

    /**
     * @return int
     */
    public function getLastID(): int
    {
        return $this->dbh->lastInsertId();
    }


}