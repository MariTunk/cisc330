<?php

namespace app\models;

use PDO;
use PDOException;

abstract class Model {
    protected $table;

    private function connect() {
        $dsn = "mysql:host=" . DBHOST . ";dbname=" . DBNAME . ";";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        try {
            return new PDO($dsn, DBUSER, DBPASS, $options);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), $e->getCode());
        }
    }

    public function findAll() {
        $query = "SELECT * FROM $this->table";
        return $this->fetchAll($query);
    }

    protected function fetch($query, $params = []) {
        $connection = $this->connect();
        $stmt = $connection->prepare($query);
        $stmt->execute($params);
        return $stmt->fetch();
    }

    protected function fetchAll($query, $params = []) {
        $connection = $this->connect();
        $stmt = $connection->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }
}
