<?php
namespace blog\src\repository;

use blog\src\lib\Database;
use blog\src\models\Posts;

class PostsRepo {

    public Database $database;

    public function create($tilte, $content) {

        $statement = $this->database->getDatabase()->prepare("INSERT INTO post(title,content,creation_date) VALUES(?, ?, NOW())");
        $statement->execute([$tilte, $content]);

    }

    public function getAll(): array {

        $statement = $this->database->getDatabase()->prepare("SELECT id, title, content, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%imin%ss') FROM posts ORDER BY creation_date");
        $statement->execute();
        $posts = [];

        var_dump($statement->fetch());
        while ($row = $statement->fetch()) {
            $post = new Posts($row['id'], $row['title'], $row['content'], $row['creation_date']);
            $posts[] = $post;
        }

        return  $posts;

    }

    public function get($id): Posts {

        $statement = $this->database->getDatabase()->prepare("SELECT id, title, content, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%imin%ss') FROM posts WHERE id = ?");
        $statement->execute($id);
        $row = $statement->fetch();
        $post = new Posts($row['id'], $row['title'], $row['content'], $row['creation_date']);

        return  $post;

    }

}