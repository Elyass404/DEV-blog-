<?php

require_once 'user.php';
require_once 'article.php';

class Admin extends User {
    private $article;
    
    public function __construct($db, $data = []) {
        parent::__construct($db, $data);
        $this->article = new Article($db);
    }

    // Methods for managing users
    public function createUser($data) {
        return $this->crud->create($data, 'users');
    }

    public static function readUser($conditions = []) {
        return $this->crud->read($conditions, 'users');
    }

    public function updateUser($data, $conditions) {
        return $this->crud->update($data, $conditions, 'users');
    }

    public function deleteUser($conditions) {
        return $this->crud->delete($conditions, 'users');
    }

    // Methods for managing categories
    public function createCategory($data) {
        return $this->crud->create($data, 'categories');
    }

    public function readCategory($conditions = []) {
        return $this->crud->read($conditions, 'categories');
    }

    public function updateCategory($data, $conditions) {
        return $this->crud->update($data, $conditions, 'categories');
    }

    public function deleteCategory($conditions) {
        return $this->crud->delete($conditions, 'categories');
    }

    // Methods for managing tags
    public function createTag($data) {
        return $this->crud->create($data, 'tags');
    }

    public function readTag($conditions = []) {
        return $this->crud->read($conditions, 'tags');
    }

    public function updateTag($data, $conditions) {
        return $this->crud->update($data, $conditions, 'tags');
    }

    public function deleteTag($conditions) {
        return $this->crud->delete($conditions, 'tags');
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
