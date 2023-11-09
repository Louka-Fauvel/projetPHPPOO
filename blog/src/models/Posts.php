<?php
namespace blog\src\models;

class Posts {

    private $id;
    private $title;
    private $content;
    private $creation_date;

    public function __construct($id, $title, $content, $creation_date) {

        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->creation_date = $creation_date;

    }

    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title): void {
        $this->title = $title;
    }

    public function getContent() {
        return $this->content;
    }

    public function setContent($content): void {
        $this->content = $content;
    }

    public function getCreationDate() {
        return $this->creation_date;
    }

    public function setCreationDate($creation_date): void {
        $this->creation_date = $creation_date;
    }

}