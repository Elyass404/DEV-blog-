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

$articleId = $_GET['id'] ;

// $resultArticles = article::read($db,["articles.id"=>$articleId]);
$resultArticles = article::read($db,["title"=>"fixed"]); // hadi khdma ms title NO

var_dump($resultArticles);






?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!DOCTYPE html>
<html lang="en">

<head>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article Page</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
</head>

<body class="bg-gray-100">
<nav class="bg-white shadow-md flex justify-between items-center p-4">
    <!-- Back Button (Left) -->
    <button onclick="window.history.back()" class="p-2 rounded-full bg-gray-200 hover:bg-gray-300 focus:outline-none">
        <i class="fas fa-arrow-left text-lg text-gray-600">Previous page</i>
    </button>

    <!-- Sign-Out Button (Right) -->
    <button onclick="window.location.href='logout.php'" class="p-2 rounded-full bg-blue-500 hover:bg-blue-600 text-white focus:outline-none">
        <i class="fas fa-sign-out-alt text-lg">Logout</i>
    </button>
</nav>

<!-- Optional: Add Tailwind CDN to the head of your HTML if not added yet -->
<!-- <script src="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.js"></script> -->


<script>
    // Simple toggle for dropdown menus
    const alertDropdown = document.querySelector('#alertsDropdown');
    const messagesDropdown = document.querySelector('#messagesDropdown');
    const userDropdown = document.querySelector('#userDropdown');

    alertDropdown.addEventListener('click', function() {
        const dropdownMenu = alertDropdown.querySelector('.dropdown-menu');
        dropdownMenu.classList.toggle('hidden');
    });

    messagesDropdown.addEventListener('click', function() {
        const dropdownMenu = messagesDropdown.querySelector('.dropdown-menu');
        dropdownMenu.classList.toggle('hidden');
    });

    userDropdown.addEventListener('click', function() {
        const dropdownMenu = userDropdown.querySelector('.dropdown-menu');
        dropdownMenu.classList.toggle('hidden');
    });
</script>


    <!-- Article Single Page -->
    <div class="max-w-7xl mx-auto px-4 py-8">
        <!-- Article Header -->
        <div class="mb-8">
            <button onclick="window.history.back()" class="text-blue-500 hover:text-blue-700 font-bold">
                &#8592; Go Back
            </button>
            <h1 class="text-3xl font-semibold mt-4 text-gray-900">Article Title Here</h1>
            <div class="flex items-center text-sm text-gray-600 mt-2">
                <span class="mr-4">By <span class="font-semibold">John Doe</span></span>
                <span>Posted on <span class="font-semibold">January 12, 2025</span></span>
            </div>
            <div class="flex items-center text-sm text-gray-600 mt-2">
                <span class="mr-4">Category: <span class="font-semibold bg-orange-400 px-4 py-1 rounded mr-1">Technology</span></span>
                <span>Tags: 
                    <span class="font-semibold">
                    <?php
                            $getTags = tag::getTags($articleId,$db);
                                                
                                                
                        foreach($getTags as $tag) {
                                                        
                            echo '<span class="badge bg-blue-400 px-4 py-1 rounded mr-1">' .htmlspecialchars($tag["name"]) . '</span>';
                        }
                        ?>

                    </span>
                </span>
            </div>
        </div>

        <!-- Article Image -->
        <div class="mb-8">
            <img src="https://images.unsplash.com/photo-1607799279861-4dd421887fb3?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Article Image" class="w-full h-96 object-cover rounded-lg shadow-lg">
        </div>

        <!-- Article Content -->
        <div class="prose lg:prose-xl text-gray-800">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ac purus ut velit cursus fermentum. Integer pharetra, nisl nec suscipit blandit, justo metus laoreet elit, eu hendrerit turpis nunc non metus. Sed ac ante et ipsum viverra fermentum sit amet eu ligula. Ut eu neque vitae nulla mollis cursus. Vestibulum ut nunc purus. Donec vulputate mollis lectus eu venenatis. Ut vulputate malesuada nunc, eu iaculis turpis aliquam eget. Curabitur interdum orci id urna sodales, sit amet viverra arcu pharetra.</p>

            <h2 class="font-semibold text-xl text-gray-900 mt-4">Section Heading</h2>
            <p>Donec pellentesque augue vitae arcu euismod, id vehicula erat dictum. Integer auctor tincidunt erat, ut porttitor erat posuere in. Etiam tincidunt sollicitudin justo ac pharetra. Donec ac viverra sem, eget consequat dui.</p>

            <h3 class="font-semibold text-lg text-gray-800 mt-4">Subsection Heading</h3>
            <p>Suspendisse potenti. Nunc ac arcu a arcu feugiat feugiat at ac turpis. Proin sed lacus feugiat, viverra nunc in, varius lectus.</p>
        </div>
    </div>
    <!-- End of Article Single Page -->

   

    

</body>

</html>

</body>
</html>

