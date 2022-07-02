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

        $success = $userModel->login($mail, $password);

        if($success) {
            session_start();
            $_SESSION['name'] = $mail;
            $_SESSION['auth'] = "true";
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