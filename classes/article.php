<?php
namespace Classes;
use Classes\crud;
use PDO;
use PDOException;
require __DIR__.'/../vendor/autoload.php'; 



// require 'crud.php';

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

    public static function countArticles($db, $conditions = []) {
        $query = "SELECT COUNT(*) as total FROM articles";
        if (!empty($conditions)) {
            $query .= " WHERE " . implode(" AND ", array_map(function($key) {
                return "$key = :$key";
            }, array_keys($conditions)));
        }
        $stmt = $db->prepare($query);
        foreach ($conditions as $key => &$val) {
            $stmt->bindParam(":$key", $val);
        }
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }

    public static function countTopArticles($db){
        $query = "SELECT * FROM articles ORDER BY views DESC LIMIT 3";  // Top 3 articles ordered by views
    $stmt = $db->prepare($query);
    $stmt->execute();  // Execute the query
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 

    return $result;  
    }
    

}
?>
