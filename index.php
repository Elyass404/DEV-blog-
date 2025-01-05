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




?>














?>