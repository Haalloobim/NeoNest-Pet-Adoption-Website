<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-50">
    <x-navbar title="Adopted Pets" :user="auth()->user()" />
    <div class="max-w-5xl mx-auto p-4 space-y-4">
        @if (count($userPets) > 0)
        @foreach ($userPets as $product)
        <div
            class="bg-white shadow-md rounded-lg p-4 flex items-center space-x-4 hover:shadow-xl hover:scale-105 transition-transform duration-300 ease-in-out">
            <img
                src="{{ asset('storage/' . $product->image_path) }}"
                alt="{{ $product->name }}"
                class="w-48 h-32 object-cover rounded-lg transition-all duration-300 ease-in-out" />

            <div class="flex-1">
                <h3 class="text-lg font-semibold text-gray-800">{{ $product->name }}</h3>
                <p class="text-gray-500 text-sm">{{ $product->description }}</p>
            </div>
        </div>
        @endforeach
        @else
        <div class="flex justify-center items-center h-[75dvh]">
            <div class="text-center">
                <h3 class="text-xl font-semibold text-gray-800">No Adopted Pets</h3>
                <p class="text-gray-500 text-md">
                    Please help some
                    <a href="/showAllProducts" class="text-blue-500 hover:underline">pets</a>
                    to find a new home.
                </p>
            </div>
        </div>
        @endif
    </div>
</body>


</html>