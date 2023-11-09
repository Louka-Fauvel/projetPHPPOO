<?php
namespace blog\src\lib;

use PDO;
use PDOException;

class Database {

    private $database;

    public function getDatabase() {

        try {

            $this->database = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
            $this->database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Database initialized";

        } catch (PDOException $e) {

            echo "Erreur de connexion : " . $e->getMessage();

        }

        return $this->database;

    }

}