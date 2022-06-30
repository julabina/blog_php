<?php

namespace App\Lib;

/**
 * Connect to db
 */
class DatabaseConnection {

    public ?\PDO $database = null;

    /**
     * Create connection to db
     * 
     * @return PDO
     */
    public function getConnection(): \PDO {

        if($this->database === null) {
            $this->database = new \PDO('mysql:host=localhost;dbname=blog_php;charset=utf8', 'root', '');
        }

        return $this->database;

    }

}