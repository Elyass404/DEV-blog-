<?php
session_start();
require __DIR__.'/../vendor/autoload.php'; 

use Config\Database;
use Classes\admin;
use Classes\article;
use Classes\category;
use Classes\tag;
use Classes\user;


$database = new Database();
$db = $database->getConnection();


user:: logout();
header("Location: login.php");




?>