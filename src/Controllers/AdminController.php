<?php

namespace App\Controllers;

use App\Lib\DatabaseConnection;
use App\Models\AdminModel;
use App\Models\PostModel;
use App\Models\CommentModel;

class AdminController {

    /**
     * admin loggin
     */
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
    
    /**
     * admin logout
     */
    public function logout() {

        session_start();
        
        $_SESSION = array();

        session_destroy();

        header('Location: /blog_php');

    }

    /**
     * get posts list for admin panel
     */
    public function list() {

        $postModel = new PostModel();
        $postModel->connection = new DatabaseConnection();

        $posts = $postModel->getPosts();

        require('templates/adminList.php');

    }

    /**
     * get one post for admin panel
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

        require('templates/adminModifyArticle.php');

    }

    /**
     * create new post
     */
    public function create() {

        $title = $_POST['title'];
        $author = $_POST['author'];
        $chapo = $_POST['chapo'];
        $content = $_POST['content'];
        
        $postModel = new PostModel();
        $postModel->connection = new DatabaseConnection();

        $success = $postModel->createPost($title, $chapo, $author, $content);

        if($success) {
            header('Location: /blog_php/adminPanel/showarticles');
        } else {
            echo "pas ok";
        }
    }

    /**
     * modify one post
     * 
     * @param $id
     */
    public function modify($id) {

        $title = $_POST['title'];
        $content = $_POST['content'];
        $chapo = $_POST['chapo'];
        $author = $_POST['author'];

        $postModel = new PostModel();
        $postModel->connection = new DatabaseConnection();

        $success = $postModel->putPost($title, $chapo, $content, $author, $id);

        if($success) {
            header('Location: /blog_php/adminPanel/showarticles');
        } else {
            echo "pas ok";
        }

    } 
    
    /**
     * delete one post
     * 
     * @param $id
     */
    public function delete($id) {
        echo "article $id delete et ses commentaires"; 
    }

}