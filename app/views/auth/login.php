<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="relative">
        <nav class="bg-lime-800 bg-opacity-90 p-2 fixed top-0 left-0 w-full z-10">
            <div class="container mx-auto flex justify-between items-center">
                <div class="text-white text-lg font-bold">Logo</div>
                <ul class="hidden md:flex space-x-4">
                <li><a href="<?=BASE_URL; ?>" class="text-indigo-50">Home</a></li>
                    <li><a href="<?=BASE_URL; ?>product" class="text-indigo-50">Furniture</a></li>
                    <li><a href="<?=BASE_URL; ?>cart" class="text-indigo-50">Cart</a></li>
                    <li><a href="<?=BASE_URL; ?>login" class="text-indigo-50">Login</a></li>
                </ul>
            </div>
        </nav>
        
        <!-- Heading -->
        <div class="container mx-auto py-12 mt-16 text-center">
            <h1 class="text-4xl font-bold text-lime-900">My Account Page</h1>
        </div>
      
        <!-- Two Forms Side by Side -->
        <div class="container mx-auto py-18 mt-20"> 
            <div class="flex flex-col md:flex-row justify-between space-y-8 md:space-y-0 md:space-x-8">
                <!-- Log in Form -->
                <form action="<?php echo BASE_URL;?>login-button" method="POST" class="bg-lime-800 bg-opacity-30 rounded-lg p-8 w-full md:w-1/2">
                    <h2 class="text-2xl font-bold mb-4">Log in</h2>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-bold mb-2">Email:</label>
                        <input type="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 font-bold mb-2">Password:</label>
                        <input type="password" name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <input type="submit" value="Login" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                </form>

                <!-- Register Form -->
                <form action="<?php echo BASE_URL; ?>auth/register-button" method="POST" class="bg-lime-800 bg-opacity-30 rounded-lg p-8 w-full md:w-1/2">
                    <h2 class="text-2xl font-bold mb-4">Register</h2>
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-bold mb-2">Name:</label>
                        <input type="text" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-bold mb-2">Email:</label>
                        <input type="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 font-bold mb-2">Password:</label>
                        <input type="password" name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <input type="submit" value="Register" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                </form>
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-lime-800 text-white py-32 mt-20 relative">
            <div class="container mx-auto flex flex-col md:flex-row justify-between items-center">
                <!-- Flex container for 100% Guaranteed Product and TATA FURNITURES -->
                <div class="absolute top-0 left-0 mt-4 ml-4 flex items-center space-x-4">
                    <div class="bg-opacity-30 bg-white px-4 py-3 rounded-lg">
                        <h3 class="text-lg font-bold text-white">100% guaranteed product</h3>
                        <p class="mt-2 text-white">Loyal customers</p>
                    </div>
                    <div class="bg-opacity-30 bg-white px-4 py-3 rounded-lg">
                        <h3 class="text-lg font-bold text-white">TATA FURNITURES</h3>
                        <p class="mt-2 text-white">Your one-stop shop for premium furniture</p>
                    </div>
                </div>

                <div class="flex space-x-4 mt-4 md:mt-0 ml-auto">
                    <a href="#" class="text-white hover:text-gray-200">
                        <svg class="w-8 h-8 fill-current" viewBox="0 0 24 24">
                            <path d="M22.46 6c-.77.35-1.59.59-2.46.69a4.28 4.28 0 001.88-2.38c-.82.49-1.74.84-2.71 1.03a4.26 4.26 0 00-7.28 3.88 12.1 12.1 0 01-8.77-4.45 4.26 4.26 0 001.32 5.68 4.22 4.22 0 01-1.93-.53v.05a4.26 4.26 0 003.42 4.18c-.5.14-1.03.21-1.57.21-.39 0-.77-.04-1.14-.11a4.27 4.27 0 003.98 2.96 8.56 8.56 0 01-5.3 1.83c-.34 0-.67-.02-1-.06a12.07 12.07 0 006.52 1.91c7.82 0 12.1-6.48 12.1-12.1 0-.19-.01-.37-.02-.55a8.65 8.65 0 002.13-2.2z"></path>
                        </svg>
                    </a>
                    <a href="#" class="text-white hover:text-gray-200">
                        <svg class="w-8 h-8 fill-current" viewBox="0 0 24 24">
                            <path d="M19.54 5h-3.54v-3.54c0-1.25.01-2.86-1.75-2.86h-2.34c-1.76 0-1.76 1.6-1.76 2.86v3.54h-3.55v3.55h3.55v10.3h3.54v-10.3h3.55l.53-3.55h-4.08v-2.3c0-.97.19-1.55 1.49-1.55h2.6v-3.01z"></path>
                        </svg>
                    </a>
                    <a href="#" class="text-white hover:text-gray-200">
                        <svg class="w-8 h-8 fill-current" viewBox="0 0 24 24">
                            <path d="M12 2c5.52 0 10 4.48 10 10s-4.48 10-10 10-10-4.48-10-10 4.48-10 10-10zm0 1.85a8.12 8.12 0 00-8.15 8.15c0 4.5 3.66 8.15 8.15 8.15s8.15-3.65 8.15-8.15a8.12 8.12 0 00-8.15-8.15zm-1.25 12.72v-4.77h"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
