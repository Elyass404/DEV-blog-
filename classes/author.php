<?php

require_once 'user.php';

class Author extends User {
    public function __construct($db, $data = []) {
        parent::__construct($db, $data);
    }

    // Methods for managing articles
    public function createArticle($data) {
        return $this->crud->create($data, 'articles');
    }

    public function readArticle($conditions = []) {
        return $this->crud->read($conditions, 'articles');
    }

    public function updateArticle($data, $conditions) {
        return $this->crud->update($data, $conditions, 'articles');
    }

    public function deleteArticle($conditions) {
        return $this->crud->delete($conditions, 'articles');
    }
}
?>
