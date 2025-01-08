<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-to-r from-blue-500 to-blue-800 min-h-screen flex items-center justify-center">

    <div class="container mx-auto px-4">

        <div class="bg-white shadow-lg rounded-lg overflow-hidden max-w-lg mx-auto my-10">
            <div class="p-6">
                <div class="text-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-900">Create an Account!</h2>
                </div>
                <form class="user space-y-4" method="POST" action="register_process.php" enctype="multipart/form-data" id="signup-form">
                    <div class="md:flex md:space-x-4">
                        <div class="w-full">
                            <label for="profile_picture" class="block text-sm font-medium text-gray-700">Username</label>
                            <input type="text" class="form-control form-control-user px-4 py-2 border rounded w-full focus:outline-none focus:ring-2 focus:ring-blue-500" id="username" name="username" placeholder="Username" required>
                        </div>
                    </div>
                    <div>
                        <label for="profile_picture" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" class="form-control form-control-user px-4 py-2 border rounded w-full focus:outline-none focus:ring-2 focus:ring-blue-500" id="email" name="email" placeholder="Email Address" required>
                    </div>
                    <div class="md:flex md:space-x-4">
                        <div class="w-full">
                            <label for="profile_picture" class="block text-sm font-medium text-gray-700">Password</label>
                            <input type="password" class="form-control form-control-user px-4 py-2 border rounded w-full focus:outline-none focus:ring-2 focus:ring-blue-500" id="password" name="password" placeholder="Password" required>
                        </div>
                        <div class="w-full">
                            <label for="profile_picture" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                            <input type="password" class="form-control form-control-user px-4 py-2 border rounded w-full focus:outline-none focus:ring-2 focus:ring-blue-500" id="confirm_password" name="confirm_password" placeholder="Repeat Password" required>
                        </div>
                    </div>
                    <div>
                        <label for="profile_picture" class="block text-sm font-medium text-gray-700">Profile Picture URL</label>
                        <input type="text" class="form-control form-control-user px-4 py-2 border rounded w-full focus:outline-none focus:ring-2 focus:ring-blue-500" id="profile_picture" name="profile_picture">
                    </div>
                    <div>
                        <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                        <select class="form-control form-control-user px-4 py-2 border rounded w-full focus:outline-none focus:ring-2 focus:ring-blue-500" id="gender" name="gender" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div>
                        <label for="bio" class="block text-sm font-medium text-gray-700">Bio</label>
                        <textarea class="form-control form-control-user px-4 py-2 border rounded w-full focus:outline-none focus:ring-2 focus:ring-blue-500" id="bio" name="bio"></textarea>
                    </div>
                    <div>
                        <label for="birthdate" class="block text-sm font-medium text-gray-700">Birthdate</label>
                        <input type="date" class="form-control form-control-user px-4 py-2 border rounded w-full focus:outline-none focus:ring-2 focus:ring-blue-500" id="birthdate" name="birthdate">
                    </div>
                    <button type="submit" class="mt-4 btn btn-primary btn-user btn-block w-full py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Register Account</button>
                    <a href="https://unsplash.com/@ilyass_marghine"><button type="button" class="btn btn-primary btn-user btn-block w-full py-2 bg-blue-700 text-white rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Log In</button></a>
                </form>
            </div>
        </div>
    </div>

    <!-- Core plugin JavaScript-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script>
        // JavaScript for password validation
        document.getElementById('signup-form').addEventListener('submit', function(event) {
            var password = document.getElementById('password').value;
            var confirmPassword = document.getElementById('confirm_password').value;

            if (password !== confirmPassword) {
                alert('Passwords do not match');
                event.preventDefault();
            }
        });
    </script>

</body>

</html>
