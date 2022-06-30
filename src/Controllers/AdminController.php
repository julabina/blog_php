<?php

namespace App\Controllers;

use App\Lib\DatabaseConnection;
use App\Models\AdminModel;

class AdminController {

    public function log() {

        $name = $_POST['name'];
        $password = $_POST['password'];

        $adminModel = new AdminModel();
        $adminModel->connection = new DatabaseConnection();

        $success = $adminModel->login($name, $password);

        if(success) {

        } else {
            
        }

    }

}