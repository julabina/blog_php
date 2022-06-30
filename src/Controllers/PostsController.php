<?php

namespace App\Controllers;

use App\Lib\DatabaseConnection;
use App\Models\PostModel;

class PostsController {

    public function show() {

        $postModel = new PostModel();
        
        $postModel->connection = new DatabaseConnection();

        $posts = $postModel->getPosts();

        echo "<pre>";
        print_r($posts);
        echo "</pre>";

    }
    
}