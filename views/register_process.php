<?php
require_once '../config/connection.php';
require_once '../classes/user.php';

$database = new Database();
$db = $database->getConnection();


session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $profilePicture = $_POST['profile_picture'];
    $gender = $_POST['gender'];
    $bio = $_POST['bio'];
    $birthdate = $_POST['birthdate'];

    
//i made this because the user is dosnt have the role input when creating a new account but the admin has one

    if ($_POST['role']===null){
        $role = "simple_user";
        }else{
            $role = $_POST['role'];
        }

    $data = [
        'username' => $username,
        'email' => $email,
        'password_hash' => $password,
        'profile_picture_url' => $profilePicture,
        'gender' => $gender,
        'bio' => $bio,
        'birthdate' => $birthdate,
        'role' => $role 
    ];

   

    // to use the method register in order to add a new user to the database
    $user = new User($db, $data);
    if ($user->register()) {
        echo "Registration successful!";
        // Let's goooo to the login page
        header("Location: login.php");
        echo "Registration successful!";
        exit;
    } else {
        echo "somrhting wrong in registration.";
    }
}
?>
