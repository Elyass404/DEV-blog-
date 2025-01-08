<?php
require_once '../config/connection.php';
require_once '../classes/user.php';

$database = new Database();
$db = $database->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'];
    $password = $_POST['password'];
    

    // to crete user object that will help us execute the method log in in  th user class
    $user = new User($db, ['email' => $email, 'password_hash' => $password]);

    if ($user->login()) {
        // now we check the role to see where to go next if the login done correctly
        if ($_SESSION['role'] === 'author' || $_SESSION['role'] === 'admin') {
            header("Location: dashboard.php");
            exit;
        } else {
            header("Location: ../index.php");
            exit;
        }
    } else {
        echo "Login failed. Please check your email and password.";
    }
}
?>
