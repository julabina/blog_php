<?php

namespace App\Controllers;

use App\Lib\DatabaseConnection;
use App\Models\PostModel;
use App\Models\CommentModel;

class PostController {

    public function show($id) {

        $postModel = new PostModel();
        $commentModel = new CommentModel();
        
        $postModel->connection = new DatabaseConnection();
        $commentModel->connection = new DatabaseConnection();

        $post = $postModel->getOnePost($id);
        $comments = $commentModel->getComments($id);

        echo "<pre>";
        print_r($post);
        echo "</pre>";
        
        echo "<pre>";
        print_r($comments);
        echo "</pre>";

    }
    
}