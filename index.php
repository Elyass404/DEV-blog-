<?php

require_once 'config/connection.php';
require_once 'classes/category.php';
require_once 'classes/crud.php';
require_once 'classes/tag.php';
require_once 'classes/user.php'; 

$database = new Database();
$db = $database->getConnection();

if ($db) {
    echo "WArah khdaaaaaaaaaaaaaammma!";
} else {
    echo "Connection failed!";
}


// Data to be added
$userData = [
    'username' => 'elyass youcode',
    'email' => 'elyass@example.com',
    'password_hash' => 'hellohello',
    'role' => 'simpleuser',
    'profile_picture_url' => null,
    'gender' => 'male',
    'bio' => 'Just a regular user.',
    'birthdate' => '2000-20-02'
];

// Create User object and register the user
$user = new User($db, $userData);
$result = $user->register();

if ($result) {
    echo "User added successfully!";
} else {
    echo "Failed to add user.";
}

?>















?>