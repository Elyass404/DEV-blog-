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
}
?>
