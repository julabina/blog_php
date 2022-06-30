<?php

namespace App\Controllers;

use App\Lib\DatabaseConnection;
use App\Models\PostModel;
use App\Models\CommentModel;

class PostController {

    /**
     * Display all post
     */
    public function list() {

        $postModel = new PostModel();
        $postModel->connection = new DatabaseConnection();
        $posts = $postModel->getPosts();

        require('templates/posts.php');

    }

    /**
     * Display one post
     * 
     * @param string $id
     */
    public function show($id) {

        $postModel = new PostModel();
        $commentModel = new CommentModel();
        
        $postModel->connection = new DatabaseConnection();
        $commentModel->connection = new DatabaseConnection();

        $post = $postModel->getOnePost($id);
        $comments = $commentModel->getComments($id);

        require('templates/post.php');

    }
    
}