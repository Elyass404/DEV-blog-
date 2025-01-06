<?php

require_once 'user.php';
require 'article.php';

class Author extends User {
    private $article;

    public function __construct($db, $data = []) {
        parent::__construct($db, $data);
        $this->article = new Article($db);
    }

    // Methods for managing articles
    public function createArticle($data) {
        return $this->article->create($data, $tags);
    }

    public function readArticle($conditions = []) {
        return $this->article->read($conditions);
    }

    public function updateArticle($data, $conditions) {
        return $this->article->update($data, $conditions, $tags);
    }

    public function deleteArticle($conditions) {
        return $this->article->delete($conditions);
    }
}
?>
