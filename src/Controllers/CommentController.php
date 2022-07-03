<?php

namespace App\Controllers;

use App\Lib\DatabaseConnection;
use App\Models\CommentModel;

class CommentController {

    public function createComment($id, $userId) {

        $content = $_POST['content'];

        $commentModel = new CommentModel();
        $commentModel->connection = new DatabaseConnection();
        
        $success = $commentModel->createComment($id, $userId, $content);

        if($success) {
            header('Location: /blog_php/articles/' . $id);
        } else {
            echo "pas ok";
        } 
        
    }
    
    public function update($id, $commentId) {
        
        $content = $_POST['modifyContent'];
        
        $commentModel = new CommentModel();
        $commentModel->connection = new DatabaseConnection();
        
        $success = $commentModel->putComment($commentId, $content);
    
        if($success) {
            header('Location: /blog_php/articles/' . $id);
        } else {
            echo "pas ok";
        } 

    }
    
    public function delete($id, $commentId) {
                
        $commentModel = new CommentModel();
        $commentModel->connection = new DatabaseConnection();
        
        $success = $commentModel->deleteComment($commentId, $content);
    
        if($success) {
            header('Location: /blog_php/articles/' . $id);
        } else {
            echo "pas ok";
        } 

    }

}