<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    @vite('resources/css/app.css')
    <script>
        // JavaScript to toggle dropdown visibility
        function toggleDropdown() {
            const dropdown = document.getElementById('dropdownMenu');
            dropdown.classList.toggle('hidden');
        }
    </script>
</head>

<body class="bg-gray-100 min-h-screen">
    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-6 py-2 flex justify-between items-center">
            <!-- Centered Logo and Title -->
            <div class="flex items-center space-x-4">
                <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="h-16 w-auto">
            </div>

            <div class="text-center">
                <h1 class="text-2xl font-bold text-blue-600">Product Details</h1>
            </div>

            <!-- Profile Dropdown -->
            <div class="relative">
                <!-- Profile Picture as Button -->
                <button onclick="toggleDropdown()" class="focus:outline-none">
                    <img src="{{ asset('images/default.png') }}" alt="Profile Picture" class="h-12 w-auto rounded-full">
                </button>
                <!-- Dropdown Menu -->
                <div id="dropdownMenu"
                    class="hidden absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg">
                    <a href="{{ route('dashboard') }}"
                        class="block px-4 py-2 text-gray-600 hover:bg-gray-100">Dashboard</a>
                    <a href="{{ route('product.upload') }}"
                        class="block px-4 py-2 text-gray-600 hover:bg-gray-100">Upload Product</a>
                    <a href="#" class="block px-4 py-2 text-gray-600 hover:bg-gray-100">Account</a>
                    <a href="#" class="block px-4 py-2 text-gray-600 hover:bg-gray-100">Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Product Details Content -->
    <div class="container mx-auto px-6 py-8">
        <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
            <!-- Product Image -->
            <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}"
                class="w-full h-72 object-cover">

            <div class="p-8 text-center">
                <!-- Product Title -->
                <h2 class="text-3xl font-semibold text-gray-900">{{ $product->name }}</h2>
                <p class="text-xl text-slate-600 font-bold mt-2">Rp {{ number_format($product->price, 0, ',', '.') }}
                </p>

                <!-- Separator -->
                <hr class="my-6 border-gray-300">

                <!-- Product Description -->
                <p class="text-gray-600 leading-relaxed">{{ $product->description }}</p>

                <!-- Separator -->
                <hr class="my-6 border-gray-300">

                <!-- Category and Species -->
                <div class="flex justify-center space-x-16 mt-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">Category</h3>
                        <p class="text-gray-600">{{ ucwords($product->category ?? 'Not specified') }}</p>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">Species</h3>
                        <p class="text-gray-600">{{ ucwords($product->species ?? 'Not specified') }}</p>
                    </div>
                </div>

                <!-- Separator -->
                <hr class="my-6 border-gray-300">

                <!-- Back Button -->
                <div class="mt-8 flex flex-row gap-x-5 justify-center items-center">
                    <div>
                        <a href="{{ route('dashboard') }}"
                            class="px-6 py-2 text-gray-600 bg-gray-200 rounded-full hover:bg-gray-300 transition">
                            Back to Dashboard
                        </a>
                    </div>
                    <div>
                        <a href="{{ route('product.edit', $product->id) }}"
                            class="px-6 py-2 text-white bg-blue-600 rounded-full hover:bg-blue-700 transition">
                            Edit Product
                        </a>
                    </div>
                    <div>
                        
                        <form action="{{ route('product.delete', $product->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-6 py-[7px] text-white bg-red-600 rounded-full hover:bg-red-700 transition">
                                Delete Product
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>
