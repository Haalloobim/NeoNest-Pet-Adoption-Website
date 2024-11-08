<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Dashboard</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 min-h-screen">
    @include('navbar.navbar')

    <!-- <div class="container mx-auto px-6 py-8">
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">Account Details</h2>
        <div class="bg-white shadow-lg rounded-lg p-6 flex items-center space-x-6">
            <div>
                <h3 class="text-xl font-semibold text-gray-800">{{ $user->name }}</h3>
                <p class="text-gray-500">{{ $user->email }}</p>
                <p class="text-gray-500">Joined on {{ $user->created_at->format('F j, Y') }}</p>
            </div>
        </div>
    </div> -->

    <div class="container mx-auto px-6 py-8 flex">
        <!-- Sidebar -->
        <aside class="w-64 p-4 bg-white shadow-lg rounded-lg mr-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Filter & Sort</h2>

            <!-- Sort By -->
            <div class="mb-6">
                <h3 class="text-sm font-semibold text-gray-600 mb-2">Sort By</h3>
                <select class="text-sm w-full p-2 bg-gray-100 border border-gray-300 rounded">
                    <option value="default">Default</option>
                    <option value="price_asc">Price: Low to High</option>
                    <option value="price_desc">Price: High to Low</option>
                </select>
            </div>

            <!-- Category Filter -->
            <div class="mb-6">
                <h3 class="text-sm font-semibold text-gray-600 mb-2">Category</h3>
                <div class="space-y-2">
                    <label class="flex items-center">
                        <input type="checkbox" class="form-checkbox text-blue-600">
                        <span class="text-sm ml-2 text-gray-600">Cat</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" class="form-checkbox text-blue-600">
                        <span class="text-sm ml-2 text-gray-600">Dog</span>
                    </label>
                </div>
            </div>

            <!-- Price Filter -->
            <div class="mb-6">
                <h3 class="text-sm font-semibold text-gray-600 mb-2">Price Range</h3>
                <div class="flex justify-between gap-4">
                    <label for="FilterPriceFrom" class="flex items-center gap-2">
                        <span class="text-sm text-gray-600">Rp</span>

                        <input
                            type="number"
                            id="FilterPriceFrom"
                            placeholder="From"
                            class="w-full rounded-md border-gray-200 shadow-sm sm:text-sm" />
                    </label>

                    <label for="FilterPriceTo" class="flex items-center gap-2">
                        <span class="text-sm text-gray-600">Rp</span>

                        <input
                            type="number"
                            id="FilterPriceTo"
                            placeholder="To"
                            class="w-full rounded-md border-gray-200 shadow-sm sm:text-sm" />
                    </label>
                </div>
            </div>
        </aside>

        <!-- Product Grid -->
        <div class="flex-1">
            <h2 class="text-2xl font-semibold text-gray-700 mb-6">Your Products</h2>
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @foreach ($products as $product)
                <a href="{{ route('product.details', $product->id) }}" class="block">
                    <div class="bg-white shadow-lg rounded-lg p-4 hover:shadow-xl transition-shadow overflow-hidden">
                        <!-- Category Tag -->
                        
                        <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded-lg mb-4">
                        <div class="flex space-x-2 mb-2">
                            <span class="bg-gradient-to-r from-teal-500 to-teal-600 text-white text-xs font-semibold rounded-full px-3 py-1">
                                {{ ucwords($product->category) }}
                            </span>
                            <span class="bg-gradient-to-r from-amber-500 to-amber-600 text-white text-xs font-semibold rounded-full px-3 py-1">
                                {{ ucwords($product->species) }}
                            </span>
                            
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">{{ $product->name }}</h3>
                        <p class="text-gray-500 mb-2">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        {{-- <p class="text-gray-600 mb-4">{{ Str::limit($product->description, 60) }}</p> --}}
                    </div>
                </a>
                @endforeach
            </div>
    
            @if ($products->isEmpty())
            <p class="text-center text-gray-500 mt-10">You have no products listed for sale.</p>
            @endif
        </div>
    </div>
</body>

</html>