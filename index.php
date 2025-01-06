<?php

require 'config/connection.php';
require 'classes/category.php';
require 'classes/tag.php';

$database = new Database();
$db = $database->getConnection();

if ($db) {
    echo "WArah khdaaaaaaaaaaaaaammma!";
} else {
    echo "Connection failed!";
}


// Create instances
$category = new Category($db);
$tag = new Tag($db);

// Test create operation
$newCategory = ['name' => 'Web Development'];
$category->create($newCategory);

$newTag = ['name' => 'PHP'];
$tag->create($newTag);

// Test read operation
$categories = $category->read();
$tags = $tag->read();

print_r($categories);
print_r($tags);

// Test update operation
$category->update(['name' => 'Frontend Development'], ['id' => 1]);
$tag->update(['name' => 'JavaScript'], ['id' => 1]);

// Test delete operation
$category->delete(['id' => 2]);
$tag->delete(['id' => 2]);

?>














?>