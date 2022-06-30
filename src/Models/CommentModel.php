<?php

namespace App\Models;

use App\Lib\DatabaseConnection;

class Comment {

}

class CommentModel {

    public DatabaseConnection $connection;

    public function getComments($postId): array {

        $statement = $this->connection->getConnection()->query(
            "SELECT id, author, content, is_enabled, DATE_FORMAT(update_date, '%d/%m/%Y à %H:%i:%s') AS update_date_fr FROM comments ORDER BY creation_date DESC WHERE post_id = $postId"
        );

        $comments = [];

        while(($row = $statement->fetch())) {
            $comment = new Comment();
            $comment->id = $row['id'];
            $comment->author = $row['author'];
            $comment->content = $row['content'];
            $comment->is_enabled = $row['is_enabled'];
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