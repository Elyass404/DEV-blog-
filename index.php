<?php

require_once 'config/connection.php';
// require_once 'classes/admin.php'; 
require_once 'classes/article.php';
require_once 'classes/category.php';
require_once 'classes/crud.php';
require_once 'classes/tag.php';
require_once 'classes/user.php'; 




$database = new Database();
$db = $database->getConnection();



if ($db) {
    echo "WArah khdaaaaaaaaaaaaaammma!<br>";
    echo $_SESSION['role'];
} else {
    echo "Connection failed!";
}


// Data to be added
$userData = [
    'username' => 'brahim',
    'email' => 'brahim@example.com',
    'password_hash' => 'hellohello',
    'role' => 'author',
    'profile_picture_url' => null,
    'gender' => 'male',
    'bio' => 'Just a regular user.',
    'birthdate' => '2000-12-02'
];

// Create User object and register the user
$user = new User($db, $userData);
$id= 2;

//REGISTER / CREATE METHOD (user) 
// $result = $user->register();

// if ($result) {
//     echo "User added successfully!";
// } else {
//     echo "Failed to add user.";
// }


// READ METHOD (user)  
// $result = $user->read(['id' => $id]); 

// if ($result) {
//      echo"<pre>";
//     print_r($result); 
//     echo"</pre>";
// } else {
//     echo "Rah makayn hta user bhad l ID.";
// }


//UPDATE METHOD (user)
// $updatingData=['username' => 'imran coder'];
// $result = $user->manageProfile($updatingData, ['id'=>$id]); 
// if ($result){ 
//     echo "User updated successfully!<br>";
// } else { echo "Failed to update user.<br>";}


//DELETE MTHOD (user) 
// $result = $user->deleteUser(['id' => $id]); 

// if ($result) { echo "User deleted successfully!<br>";
// } else { 
//     echo "Failed to delete user.<br>";}

//-------------------------------------
//TESTINT THE TAGS AND CATEGORIES

$category = new Category($db);
$tagOne = new Tag($db);
$tagTwo = new Tag($db);


//CREATE METHOD 
// $resultCategory  = $category->create(['name'=>'Development']); 
// $resultTagOne  = $tagOne->create(['name'=>'Javascript']); 
// $resultTagTwo  = $tagTwo->create(['name'=>'UI/UX Design']); 

// if ($resultCategory) { echo "Category created successfully!<br>";
// } else { echo "Failed to create category.<br>";}

// if ($resultTagOne) { echo "Tag One created successfully!<br>";
// } else { echo "Failed to create Tag One.<br>";}

// if ($resultTagTwo) { echo "Tag Two created successfully!<br>";
// } else { echo "Failed to create Tag Two.<br>";}


//READ METHOD
// $resultCategory  = $category->read(); 
// $resultTagOne  = $tagOne->read(['id'=>7]); 
// $resultTagTwo  = $tagTwo->read(['id'=>8]); 

// if ($resultCategory) { 
//     echo"<pre>";
//      print_r($resultCategory); 
//     echo"</pre>";
// } else { echo "Failed to find category.<br>";}

// if ($resultTagOne) { 
//     echo"<pre>";
//      print_r($resultTagOne); 
//     echo"</pre>";
// } else { echo "Failed to find Tag One.<br>";}

// if ($resultTagTwo) { 
//     echo"<pre>";
//      print_r($resultTagTwo); 
//     echo"</pre>";
// } else { echo "Failed to find Tag Two.<br>";}

//---------------------------------------------------------------
//TESTING THE ARTICLE

// $article = new Article($db);

// $articleData = [
// 'title' => 'fixed',
// 'slug'=> 'youbbbfghjkcode',
// 'content' => 'Just something in here to fill the the column of the contet',
// 'author_id' => 3,
// 'category_id' => 6, 
// 'created_at' => "2000-02-12",
// 'status' => 'pending', 
// 'views' => 0
// ];

// $tags = [7, 6, 8]; 

// $resultArticle = $article->create($articleData, $tags);
// if ($resultArticle) { echo "Article created successfully!<br>";
// } else {
//     echo "Failed to create article.<br>";
// }

//--------------------------------------------------------
//TESTING THE STATISCTIC OF EACH ONE OF THE CLASSES 
$totalUsers = category::countCategories($db); 
echo "Total Users: " . $totalUsers


?>

