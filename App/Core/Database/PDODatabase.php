<?php

namespace App\Core\Database;

class PDODatabase implements DatabaseInterface
{
    private $db;

    public function __construct(string $host, string $dbName, string $user, string $password)
    {
        $this->db = new \PDO(
            "mysql:host={$host};dbname={$dbName};charset=utf8",
            $user,
            $password,
            [\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]
        );
    }

    public function prepare(string $query): DatabaseStatementInterface
    {
        $stmt = $this->db->prepare($query);

        return new PDOStatement($stmt);
    }

    public function getLastId(string $name = null)
    {
        return $this->db->lastInsertId($name);
    }

    public function __destruct()
    {
        $this->db = null;
    }
}