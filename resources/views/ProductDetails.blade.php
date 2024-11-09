<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 min-h-screen">
    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-blue-600">Product Details</h1>
            <ul class="flex space-x-4">
                <li><a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-blue-600">Dashboard</a></li>
                <li><a href="{{ route('product.upload') }}" class="text-gray-600 hover:text-blue-600">Upload Product</a></li>
                <li><a href="#" class="text-gray-600 hover:text-blue-600">Account</a></li>
                <li><a href="#" class="text-gray-600 hover:text-blue-600">Logout</a></li>
            </ul>
        </div>
    </nav>

    <!-- Product Details Content -->
    <div class="container mx-auto px-6 py-8">
        <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
            <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}"
                class="w-full h-64 object-cover">

            <div class="p-6">
                <h2 class="text-3xl font-semibold text-gray-800">{{ $product->name }}</h2>
                <p class="text-gray-500 mt-2">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                <p class="mt-4 text-gray-600">{{ $product->description }}</p>

                <div class="mt-6">
                    <h3 class="text-lg font-semibold text-gray-800">Category</h3>
                    <p class="text-gray-600">{{ $product->category ?? 'Not specified' }}</p>
                </div>
                <div class="mt-6">
                    <h3 class="text-lg font-semibold text-gray-800">Species</h3>
                    <p class="text-gray-600">{{ $product->species ?? 'Not specified' }}</p>
                </div>

                <div class="mt-6 flex items-center space-x-4">
                    {{-- <a href="{{ route('product.edit', $product->id) }}"
                        class="px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                        Edit Product
                    </a> --}}
                    <a href="{{ route('dashboard') }}"
                        class="px-4 py-2 text-gray-600 bg-gray-200 rounded-lg hover:bg-gray-300">
                        Back to Dashboard
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>



</html>
