<?php

require 'crud.php';

class Article {
    private $crud;

    public function __construct($db) {
        $this->crud = new CRUD($db);
    }

    public function create($data, $tags = []) {
        // insert the article into the articles table
        $result = $this->crud->create($data, 'articles');

        if ($result) {
            // get the last inserted article ID
            $articleId = $this->crud->conn->lastInsertId();

         // insert the tags into the article_tags table
            foreach ($tags as $tagId) {
                $this->crud->create(['article_id' => $articleId, 'tag_id' => $tagId], 'article_tags');
            }
        }

        return $result;
    }

    public function read($conditions = []) {
        return $this->crud->read($conditions, 'articles');
    }

    public function update($data, $conditions, $tags = []) {
        //   update the article in the articles table
        $result = $this->crud->update($data, $conditions, 'articles');

        if ($result) {
     // get the article ID from conditions
            $articleId = $conditions['id'];

            // delete existing tags for the article
            $this->crud->delete(['article_id' => $articleId], 'article_tags');

        // insert the new tags into the article_tags table
            foreach ($tags as $tagId) {
                $this->crud->create(['article_id' => $articleId, 'tag_id' => $tagId], 'article_tags');
            }
        }

        return $result;
    }

    public function delete($conditions) {
        // delete the article in the articles table
        return $this->crud->delete($conditions, 'articles');
    }
}
?>
