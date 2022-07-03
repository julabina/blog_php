<?php

namespace App\Controllers;

use App\Lib\DatabaseConnection;
use App\Models\UserModel;

class UserController {

    public function log() {

        $mail = $_POST['email'];
        $password = "" . $_POST['password'] . "";

        $userModel = new UserModel();
        $userModel->connection = new DatabaseConnection();

        $user = $userModel->login($mail, $password);

        if(sizeof($user) > 0) {
            session_start();
            $_SESSION['name'] = $mail;
            $_SESSION['fullname'] = $user[1] . " " . $user[2];
            $_SESSION['auth'] = "true";
            $_SESSION['userId'] = $user[0];
        } 

        header('Location: /blog_php');
        
    }
        
    /**
     * user logout
     */
    public function logout() {

        session_start();
        
        $_SESSION = array();

        session_destroy();

        header('Location: /blog_php');

    }

    public function sign() {
        
        $mail = $_POST['email'];
        $password = "" . $_POST['password'] . "";
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        
        $userModel = new UserModel();
        $userModel->connection = new DatabaseConnection();
        
        $success = $userModel->createUser($firstname, $lastname, $mail, $password);
        
        if($success) {
            echo 'utilisateur créé';
        } else {
            header('Location: /blog_php');
        }
        
    }

}