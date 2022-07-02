<?php

namespace App\Models;

use App\Lib\DatabaseConnection;
use \Ramsey\Uuid\Uuid;

class UserModel {

    public DatabaseConnection $connection;

    public function login(string $mail, string $password): bool {

        $statement = $this->connection->getConnection()->query(
            "SELECT * FROM users WHERE email = '$mail'"
        );

        $user = $statement->fetch();

        if($user) {
            if(password_verify($password ,$user['pwd'])) {
                    return true;
            } 
        }

        return false;
        
    }

    public function adminLogin(string $mail, string $password): bool {

        $statement = $this->connection->getConnection()->query(
            "SELECT * FROM users WHERE email = '$mail'"
        );

        $user = $statement->fetch();

        if($user) {
            if(password_verify($password ,$user['pwd'])) {
                if($user['is_admin']) {
                    return true;
                }
            } 
        }

        return false;
        
    }

    public function createUser(string $firstname, string $lastname, string $mail, string $password): bool {

        $v4 = Uuid::uuid4();
        $newId = $v4->toString();
        $newPassword = password_hash($password, PASSWORD_DEFAULT);

        $statement = $this->connection->getConnection()->prepare(
            "INSERT INTO users(id, email, firstname, lastname, pwd, created_at) VALUES (?, ?, ?, ?, ?, NOW())"
        );

        $affectedLine = $statement->execute([$newId, $mail, $firstname, $lastname, $newPassword]);

        return ($affectedLine > 0);
        
    }

}