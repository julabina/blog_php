<?php

namespace App\Controllers;

use App\Lib\DatabaseConnection;
use App\Models\CommentModel;

class CommentController {

    public function createComment($id) {

        $commentModel = new CommentModel();
        $commentModel->connection = new DatabaseConnection();
        
        $success = $commentModel->createComment();

        if(success) {
            echo "ok";
        } else {
            echo "pas ok";
        }

    }

}