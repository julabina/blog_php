<?php

namespace App\Models;

use App\Lib\DatabaseConnection;

class Post {
    public string $id;
    public string $title;
    public string $chapo;
    public string $content;
    public string $author;
    public string $update_date;
}

class PostModel {

    public DatabaseConnection $connection;
    
    /**
     * get all posts
     * 
     * @return array
     */
    public function getPosts(): array {
        
        $statement = $this->connection->getConnection()->query(
            "SELECT id, title, chapo, DATE_FORMAT(update_date, '%d/%m/%Y à %H:%i:%s') AS update_date_fr  FROM posts ORDER BY creation_date DESC"
        );

        $posts = [];

        while(($row = $statement->fetch())) {

            $post = new Post();
            $post->id = $row['id'];
            $post->title = $row['title'];
            $post->chapo = $row['chapo'];
            $post->update_date = $row['update_date_fr'];

            $posts[] = $post;

        }

        return $posts;

    }

    /**
     * get one post
     * 
     * @param string $postId
     * 
     * @return Post()
     */
    public function getOnePost($postId): Post {

        $statement = $this->connection->getConnection()->query(
            "SELECT id, title, content, chapo, author, DATE_FORMAT(update_date, '%d/%m/%Y à %H:%i:%s') AS update_date_fr FROM posts WHERE id = $postId"
        );

        $data = $statement->fetch();

        if(!is_array($data)) {
            return header('Location: /blog_php/'); 
        }

        $post = new Post();

        $post->id = $postId;
        $post->title = $data['title'];
        $post->chapo = $data['chapo'];
        $post->content = $data['content'];
        $post->author = $data['author'];
        $post->update_date = $data['update_date_fr'];

        return $post;

    }

    /**
     * create new post
     * 
     * @param string $title
     * @param string $chapo
     * @param string $content
     * @param string $author
     * 
     * @return boolean
     */
    public function createPost(string $title, string $chapo, string $author, string $content): bool  {

        $statement = $this->connection->getConnection()->prepare(
            "INSERT INTO posts(title, content, chapo, author, creation_date, update_date) VALUES (?, ?, ?, ?, NOW(), NOW())"
        );

        $affectedLine = $statement->execute([$title, $content, $chapo, $author]);

        return ($affectedLine > 0);

    }

    /**
     * modify one post
     * 
     * @param string $title
     * @param string $chapo
     * @param string $content
     * @param string $id
     * 
     * @return boolean
     */
    public function putPost(string $title, string $chapo, string $content, string $author, $id): bool {

        $statement = $this->connection->getConnection()->prepare(
            "UPDATE posts SET title = ?, chapo = ?, content = ?, author = ?, update_date = NOW() WHERE id = ?"
        );

        $affectedLine = $statement->execute([$title, $chapo, $content, $author, $id]);

        return ($affectedLine > 0);
    }
    
}