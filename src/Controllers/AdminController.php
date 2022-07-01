<?php

namespace App\Controllers;

use App\Lib\DatabaseConnection;
use App\Models\AdminModel;

class AdminController {

    public function log() {   

        if((isset($_POST['email']) && $_POST['email'] !== "" && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) && (isset($_POST['password']) && $_POST['password'] !== "") && preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/', $_POST['password'])) {
            
            $mail = $_POST['email'];
            $password = "" . $_POST['password'] . "";

            $adminModel = new AdminModel();
            $adminModel->connection = new DatabaseConnection();
    
            $success = $adminModel->login($mail, $password);
    
            if($success) {
               
                session_start();
                $_SESSION['name'] = "admin";
                $_SESSION['auth'] = "true";
                $_SESSION['userType'] = "admin";

                header('Location: /blog_php/adminPanel');
               
            } else {
                header('Location: /blog_php');
            }
            
        } else {
            header('Location: /blog_php');
        }
        
    }
    
    public function logout() {

        session_start();
        
        $_SESSION = array();

        session_destroy();

        header('Location: /blog_php');

    }

     

}