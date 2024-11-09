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
                <select name="price_range" class="text-sm w-full p-2 bg-gray-100 border border-gray-300 rounded">
                    <option value="">Select Price Range</option>
                    <option value="0-500000">Rp 0 - Rp 500,000</option>
                    <option value="500000-1000000">Rp 500,000 - Rp 1,000,000</option>
                    <option value="1000000-1500000">Rp 1,000,000 - Rp 1,500,000</option>
                    <option value="1500000-2000000">Rp 1,500,000 - Rp 2,000,000</option>
                    <option value="2500000-3000000">Rp 2,500,000 - Rp 3,000,000</option>
                    <option value="3000000 - 15000000">Price > Rp 3,000,000</option>
                </select>
            </div>

            <div class="mb-2 mt-4 flex flex-col items-center justify-center text-center">
                <button id="filterButton" class="w-[85%] bg-blue-500 text-white py-2 rounded hover:bg-blue-700 transition">Apply Filter</button>
            </div>
        </aside>

        <!-- Product Grid -->
        <div class="flex-1">
            <h2 class="text-2xl font-semibold text-gray-700 mb-6">Your Products</h2>
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @foreach ($products as $product)
                    <a href="{{ route('product.details', $product->id) }}" class="block">
                        <div class="bg-white shadow-lg rounded-lg p-4 hover:shadow-xl transition-shadow overflow-hidden">
                            <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded-lg mb-4">
                            <div class="flex space-x-2 mb-2">
                                <span class="bg-gradient-to-r from-teal-500 to-teal-600 text-white text-xs font-semibold rounded-full px-3 py-1">{{ ucwords($product->category) }}</span>
                                <span class="bg-gradient-to-r from-amber-500 to-amber-600 text-white text-xs font-semibold rounded-full px-3 py-1">{{ ucwords($product->species) }}</span>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-800">{{ $product->name }}</h3>
                            <p class="text-gray-500 mb-2">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
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

<script>
    document.getElementById('filterButton').addEventListener('click', function () {
        // Gather filter values
        const sortBy = document.querySelector('select').value;
        const categories = Array.from(document.querySelectorAll('input[type="checkbox"]:checked')).map(cb => cb.nextElementSibling.innerText.trim());
        const priceRange = document.querySelector('select[name="price_range"]').value;
        
        // Parse the price range
        let priceFrom = 0;
        let priceTo = 0;
        if (priceRange) {
            let prices = priceRange.split('-');
            priceFrom = prices[0];
            priceTo = prices[1] ? prices[1] : 3000000; // Handle case where priceTo is missing (e.g., 'Price > Rp 3,000,000')
        }

        // Prepare data for the request
        const data = {
            sortBy,
            categories,
            priceFrom,
            priceTo
        };

        // Send AJAX request to filter route
        fetch('/filter-products', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            // Update product grid
            const productGrid = document.querySelector('.grid');
            productGrid.innerHTML = ''; // Clear existing products

            if (data.products.length) {
                data.products.forEach(product => {
                    const productHTML = `
                    <a href="/product/details/${product.id}" class="block">
                        <div class="bg-white shadow-lg rounded-lg p-4 hover:shadow-xl transition-shadow overflow-hidden">
                            <img src="/storage/${product.image_path}" alt="${product.name}" class="w-full h-48 object-cover rounded-lg mb-4">
                            <div class="flex space-x-2 mb-2">
                                <span class="bg-gradient-to-r from-teal-500 to-teal-600 text-white text-xs font-semibold rounded-full px-3 py-1">${product.category}</span>
                                <span class="bg-gradient-to-r from-amber-500 to-amber-600 text-white text-xs font-semibold rounded-full px-3 py-1">${product.species}</span>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-800">${product.name}</h3>
                            <p class="text-gray-500 mb-2">Rp ${new Intl.NumberFormat().format(product.price)}</p>
                        </div>
                    </a>`;
                    productGrid.innerHTML += productHTML;
                });
            } else {
                productGrid.innerHTML = `<p class="text-center text-gray-500 mt-10">No products match the selected filters.</p>`;
            }
        })
        .catch(error => console.error('Error:', error));
    });
</script>

</html>
