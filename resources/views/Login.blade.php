<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-50">
    <div class="w-full max-w-md p-8 space-y-4 bg-white shadow-lg rounded-xl">
        <div class="flex justify-center">
            <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="w-40 h-40">
        </div>
        <div class="space-y-2">
            <h2 class="text-2xl font-bold text-center text-gray-700 mt-0 mb-1 leading-tight">Welcome Back!</h2>
            <p class="text-sm text-center text-gray-500 mt-0 mb-4 leading-tight">Login to access your account</p>
        </div>

        <!-- Display error message if login fails with red text -->
        @if (session('error'))
            <div class="text-red-500">{{ session('error') }}</div>
        @endif

        <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" required
                    class="block w-full px-4 py-2 mt-1 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" required
                    class="block w-full px-4 py-2 mt-1 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500">
            </div>

            <button type="submit"
                class="w-full px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:bg-blue-800 focus:ring focus:ring-blue-300">
                Log In
            </button>
        </form>
    </div>
</body>
</html>
