<?php
namespace blog\src\models;

use DateTime;

class Posts {

    private int $id;
    private string $title;
    private string $content;
    private DateTime $creation_date;

    public function __construct(int $id, string $title, string $content, string $creation_date) {

        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->creation_date = date_create($creation_date);

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
        return $this->creation_date->format('d/m/Y H:i');
    }

    public function setCreationDate($creation_date): void {
        $this->creation_date = $creation_date;
    }

}