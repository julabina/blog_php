<?php

namespace App\Controllers;

use App\Lib\DatabaseConnection;
use App\Models\UserModel;

class UserController {

    /**
     * login function
     */
    public function log() {

        if(
            (isset($_POST['email']) && $_POST['email'] !== "" && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) && 
            (isset($_POST['password']) && $_POST['password'] !== "") && preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/', $_POST['password'])
        ) {
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
            
        } else {
            
            header('Location: /blog_php');
            
        }
        
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

    /**
     * create an user account
     */
    public function sign() {

        if(
            (isset($_POST['email']) && $_POST['email'] !== "" && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) &&
            (isset($_POST['password']) && $_POST['password'] !== "") && preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/', $_POST['password']) &&
            (isset($_POST['firstname']) && $_POST['firstname'] !== "" && preg_match('/^[a-zA-Zé èà]*$/', $_POST['firstname'])) &&
            (isset($_POST['lastname']) && $_POST['lastname'] !== "" && preg_match('/^[a-zA-Zé èà]*$/', $_POST['lastname']))
        ) {

            
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
        } else {
            
            header('Location: /blog_php');
            
        }
        
    }

    /**
     * send mail
     */
    public function sendMail() {

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        $userModel = new UserModel();
        $success = $userModel->sendMail($firstname, $lastname, $email, $message);

        if($success) {

        } else {

        }

    }

}