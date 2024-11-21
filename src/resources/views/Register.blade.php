<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    @vite('resources/css/app.css')
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-50">
    <div class="w-full max-w-md p-8 space-y-2 bg-white shadow-lg rounded-xl">
        <div class="flex justify-center">
            <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="w-40 h-40">
        </div>
        <div class="space-y-2">
            <h2 class="text-2xl font-bold text-center text-gray-700 mt-0 mb-1 leading-tight">Create a New Account</h2>
            <p class="text-sm text-center text-gray-500 mt-0 mb-4 leading-tight">Sign up and start your adoption today!</p>
        </div>

        @if ($errors->any())
            <div class="text-red-500 text-center">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="mt-8 space-y-4" action="{{ route('register') }}" method="POST">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                <input type="text" id="name" name="name" required
                    class="block w-full px-4 py-2 mt-1 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500">
            </div>

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

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required
                    class="block w-full px-4 py-2 mt-1 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500">
            </div>

            <div class="flex items-center">
                <input type="checkbox" id="is_seller" name="is_seller" value="1"
                    class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                <label for="is_seller" class="ml-2 text-sm text-gray-700">I am a seller</label>
            </div>

            <button type="submit"
                class="w-full px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:bg-blue-800 focus:ring focus:ring-blue-300">
                Sign Up
            </button>

            <div class="text-sm text-center text-gray-700 mt-4">
                Already have an account? <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Log in</a>
            </div>
        </form>
    </div>
</body>
</html>
