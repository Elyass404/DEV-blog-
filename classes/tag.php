<?php

require_once 'crud.php'; 

class Tag {
    private $id;
    private $name;
    private $crud;

    public function __construct($db) {
        $this->crud = new CRUD($db);
    }

    public function create($data) {
        return $this->crud->create($data, 'tags');
    }

    public function read($conditions = []) {
        return $this->crud->read($conditions, 'tags');
    }

    public function update($data, $conditions) {
        return $this->crud->update($data, $conditions, 'tags');
    }

    public function delete($conditions) {
        return $this->crud->delete($conditions, 'tags');
    }

    public static function countTags($db, $conditions = []) {
        $query = "SELECT COUNT(*) as total FROM tags";
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
