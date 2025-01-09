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

    public function topAuthors($conditions) {
        $query = "SELECT author_id count(*) as top_authors FROM articles GROUP BY  ORDER BY views DESC LIMIT 3";  // Top 3 articles ordered by views
    $stmt = $db->prepare($query);
    $stmt->execute();  // Execute the query
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>



