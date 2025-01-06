<?php

require_once 'crud.php';

class Category {
    private $id;
    private $name;
    private $crud;

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
}
?>
