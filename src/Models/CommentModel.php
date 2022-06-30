<?php

namespace App\Models;

use App\Lib\DatabaseConnection;

class Comment {
    public string $id ;
    public string $author ;
    public string $content ;
    public string $is_enabled ;
    public string $update_date ;
}

class CommentModel {

    public DatabaseConnection $connection;

    public function getComments($postId): array {

        $statement = $this->connection->getConnection()->query(
            "SELECT id, author, content, DATE_FORMAT(update_date, '%d/%m/%Y à %H:%i:%s') AS update_date_fr FROM comments WHERE post_id = $postId AND is_enabled = 1 ORDER BY creation_date DESC"
        );

        $comments = [];

        while(($row = $statement->fetch())) {
            $comment = new Comment();
            $comment->id = $row['id'];
            $comment->author = $row['author'];
            $comment->content = $row['content'];
            $comment->update_date = $row['update_date_fr'];

            $comments[] = $comment;
        }

        return $comments;
    }

    public function createComment() {

    }

    public function modifyComment() {

    }

    public function deleteComment() {

    }

}