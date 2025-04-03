<?php

namespace app\models;

use PDO;
use PDOException;

abstract class Model {

    private function connect() {
        $dsn = "mysql:host=" . DBHOST . ";dbname=" . DBNAME . ";charset=utf8mb4";

        try {
            $con = new PDO($dsn, DBUSER, DBPASS, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Enable exceptions
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Fetch as associative array
                PDO::ATTR_EMULATE_PREPARES => false // Disable emulation for security
            ]);
            return $con;
        } catch (PDOException $e) {
            die(json_encode(['error' => 'Database connection failed: ' . $e->getMessage()]));
        }
    }

    public function query($query, $data = []) {
        try {
            $con = $this->connect();
            $stm = $con->prepare($query);
            $stm->execute($data);
            return $stm->fetchAll(); // No need to set FETCH_ASSOC again
        } catch (PDOException $e) {
            return ['error' => 'Query failed: ' . $e->getMessage()];
        }
    }
}
?>

