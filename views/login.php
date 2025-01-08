<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-to-r from-blue-500 to-blue-800 min-h-screen flex items-center justify-center">

    <div class="container mx-auto px-4">

        <div class="bg-white shadow-lg rounded-lg overflow-hidden max-w-lg mx-auto my-10">
            <div class="md:flex">
                <div class="w-full p-6">
                    <div class="text-center mb-6">
                        <h2 class="text-2xl font-bold text-gray-900">Welcome Back!</h2>
                    </div>
                    <form class="user space-y-4" method="POST" action="login_process.php">
                        <div class="form-group">
                            <input type="email" class="form-control form-control-user px-4 py-2 border rounded w-full focus:outline-none focus:ring-2 focus:ring-blue-500" id="email" name="email" placeholder="Enter Email Address..." required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user px-4 py-2 border rounded w-full focus:outline-none focus:ring-2 focus:ring-blue-500" id="password" name="password" placeholder="Password" required>
                        </div>
                        <div class="form-group flex items-center">
                            <input type="checkbox" class="form-checkbox h-4 w-4 text-blue-600" id="remember" name="remember">
                            <label for="remember" class="ml-2 text-gray-700">Remember Me</label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block w-full py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Login</button>
                    </form>
                    <div class="text-center">
                        <a class="small text-blue-500 hover:underline" href="register.php">Create an Account!</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

</html>
