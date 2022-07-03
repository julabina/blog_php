<?php

namespace App\Models;

use App\Lib\DatabaseConnection;
use \Ramsey\Uuid\Uuid;

class Comment {
    public string $id ;
    public string $userId;
    public string $author ;
    public string $content ;
    public string $is_enabled ;
    public string $update_date ;
}

class CommentModel {

    public DatabaseConnection $connection;

    /**
     * get all comments for one post
     * 
     * @param $postId
     * 
     * @return array
     */
    public function getComments($postId): array {

        $statement = $this->connection->getConnection()->query(
            "SELECT commentId, userId, content, firstname, lastname, DATE_FORMAT(update_date, '%d/%m/%Y à %H:%i:%s') AS update_date_fr FROM comments INNER JOIN users ON comments.userId = users.id WHERE post_id = $postId AND is_enabled = 1 ORDER BY creation_date DESC; "
        );

        $comments = [];

        while(($row = $statement->fetch())) {
            $comment = new Comment();
            $comment->id = $row['commentId'];
            $comment->userId = $row['userId'];
            $comment->author = $row['firstname'] . " " . $row['lastname'];
            $comment->content = $row['content'];
            $comment->update_date = $row['update_date_fr'];

            $comments[] = $comment;
        }

        return $comments;
    }

    public function createComment(string $id, string $userId, string $content): bool {

        $v4 = Uuid::uuid4();
        $newId = $v4->toString();

        $statement = $this->connection->getConnection()->prepare(
            "INSERT INTO comments(commentId, post_id, userId, content, is_enabled) VALUES (?, ?, ?, ?, 0)"
        );

        $affectedLine = $statement->execute([$newId, $id, $userId, $content]);

        return ($affectedLine > 0);

    }

    public function putComment(string $id,string $content): bool {

        $statement = $this->connection->getConnection()->prepare(
            "UPDATE comments SET content = ?, is_enabled = 0, update_date = NOW() WHERE commentId = ?"
        );

        $affectedLine = $statement->execute([$content, $id]);

        return ($affectedLine > 0);

    }

    public function deleteComment($id): bool {

        $statement = $this->connection->getConnection()->prepare(
            "DELETE FROM comments WHERE commentId = ?"
        );

        $affectedLine = $statement->execute([$id]);

        return ($affectedLine > 0);

    }

    public function getNotEnabledComments(): array {

        $statement = $this->connection->getConnection()->query(
            "SELECT content, commentId, post_id, firstname, lastname FROM comments LEFT JOIN users ON comments.userId = users.id WHERE is_enabled = 0"
        );

        $comments = [];

        while(($row = $statement->fetch())) {
            $comment = new Comment();
            $comment->content = $row['content'];
            $comment->author = $row['firstname'] . " " . $row['lastname'];
            $comment->commentId = $row['commentId'];
            $comment->postId = $row['post_id'];

            $comments[] = $comment;
        }

        return $comments;
        
    }

    public function validateComment($id) {

        $statement = $this->connection->getConnection()->prepare(
            "UPDATE comments SET is_enabled = 1 WHERE commentId = ?"
        );

        $affectedLine = $statement->execute([$id]);

        return ($affectedLine > 0);

    }

}