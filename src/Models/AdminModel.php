<?php

namespace App\Models;

use App\Lib\DatabaseConnection;

class AdminModel {

    public DatabaseConnection $connection;

    public function login($mail, $password): bool {

        $statement = $this->connection->getConnection()->query(
            "SELECT * FROM users WHERE email = '$mail'"
        );

        $user = $statement->fetch();

        if($user) {

            if(password_verify($password ,$user['password'])) {
                return true;
            } else {
                return false;
            }

        }

        return false;
        
    }

}