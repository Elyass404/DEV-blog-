<?php
namespace Classes;
use Classes\crud;
use PDO;
use PDOException;
// require_once 'crud.php';

class Category {
    private $id;
    private $name;
    private $crud;
    // private $table = "categories";

    public function __construct($db) {
        $this->crud = new CRUD($db);
    }

    public function create($data) {
        return $this->crud->create($data, 'categories');
    }

    public function read($conditions = []) {
        return $this->crud->read($conditions, 'categories');
    }

    public function update($data, $conditions) {
        return $this->crud->update($data, $conditions, 'categories');
    }

    public function delete($conditions) {
        return $this->crud->delete($conditions, 'categories');
    }

    public static function countCategories($db, $conditions = []) {
        $query = "SELECT COUNT(*) as total FROM categories";
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
}
?>
