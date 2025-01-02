<?php

require 'config/connection.php';
// require 'crud_orm.php';

$database = new Database();
$db = $database->getConnection();

if ($db) {
    echo "WArah khdaaaaaaaaaaaaaammma!";
} else {
    echo "Connection failed!";
}













?>