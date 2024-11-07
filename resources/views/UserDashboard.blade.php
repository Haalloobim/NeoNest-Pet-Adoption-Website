<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-50">
    <!-- Include the navbar -->
    @include('navbar.navbar')

    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-md p-8 space-y-4 bg-white shadow-lg rounded-xl">
            <h2 class="text-2xl font-bold text-center text-gray-700 mb-6">Welcome to Your Dashboard</h2>

            <p class="text-center text-gray-600">Here you can explore your account.</p>

            <!-- User-specific actions -->
            <div class="space-y-4 mt-6">
                <a href="#" class="w-full block px-4 py-2 text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                    List Pet for Adoption
                </a>
                <a href="#" class="w-full block px-4 py-2 text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                    View Adopted Pet
                </a>
                <a href="#" class="w-full block px-4 py-2 text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                    Scan Pet
                </a>
            </div>
        </div>
    </div>
</body>

</html>
