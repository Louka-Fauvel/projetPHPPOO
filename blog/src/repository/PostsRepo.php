<?php
namespace blog\src\repository;

use blog\src\lib\Database;
use blog\src\models\Posts;

class PostsRepo {

    public Database $database;

    public function create($tilte, $content): void {

        $statement = $this->database->getDatabase()->prepare("INSERT INTO posts(title,content,creation_date) VALUES(?, ?, NOW())");
        $statement->execute([$tilte, $content]);

    }

    public function getAll(): array {

        $statement = $this->database->getDatabase()->prepare("SELECT id, title, content, creation_date FROM posts ORDER BY creation_date");
        $statement->execute();
        $posts = [];

        while ($row = $statement->fetch()) {
            $post = new Posts($row['id'], $row['title'], $row['content'], $row['creation_date']);
            $posts[] = $post;
        }

        return  $posts;

    }

    public function get($id): Posts {

        $statement = $this->database->getDatabase()->prepare("SELECT id, title, content, creation_date FROM posts WHERE id = ?");
        $statement->execute([$id]);
        $row = $statement->fetch();
        $post = new Posts($row['id'], $row['title'], $row['content'], $row['creation_date']);

        return  $post;

    }

    public function modify($id, $title, $content): void {

        $statement = $this->database->getDatabase()->prepare("UPDATE posts SET title = ?, content = ? WHERE id = ?");
        $statement->execute([$title, $content, $id]);

    }

    public function delete($id): void {

        $statement = $this->database->getDatabase()->prepare("DELETE FROM posts WHERE id = ?");
        $statement->execute([$id]);

    }

}