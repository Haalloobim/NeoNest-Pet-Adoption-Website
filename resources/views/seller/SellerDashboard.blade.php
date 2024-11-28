<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Dashboard</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 min-h-screen">
    <x-navbar title="Dashboard" :user="auth()->user()" />

    @if (session('success'))
        <div id="popupMessage"
            class="fixed top-4 right-4 bg-green-500 text-white p-4 rounded shadow-lg flex items-center">
            <span class="mr-2">{{ session('success') }}</span>
            <span id="countdown" class="text-sm bg-green-600 px-2 py-1 rounded ml-auto">5s</span>
        </div>
    @endif

    @if (session('error'))
        <div id="popupMessage"
            class="fixed top-4 right-4 bg-red-500 text-white p-4 rounded shadow-lg flex items-center">
            <span class="mr-2">{{ session('error') }}</span>
            <span id="countdown" class="text-sm bg-red-600 px-2 py-1 rounded ml-auto">5s</span>
        </div>
    @endif

    <div class="container mx-auto px-6 pt-8 flex max-h-screen">
        <aside class="w-64 p-4 bg-white shadow-lg rounded-lg mr-6 top-8 max-h-fit sticky md:block">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Filter & Sort</h2>

            <div class="mb-6">
                <h3 class="text-sm font-semibold text-gray-600 mb-2">Sort By</h3>
                <select class="text-sm w-full p-2 bg-gray-100 border border-gray-300 rounded">
                    <option value="default">Default</option>
                    <option value="price_asc">Price: Low to High</option>
                    <option value="price_desc">Price: High to Low</option>
                </select>
            </div>

            <div class="mb-6">
                <h3 class="text-sm font-semibold text-gray-600 mb-2">Category</h3>
                <div class="space-y-2">
                    <label class="flex items-center">
                        <input type="checkbox" name="categories" class="form-checkbox text-blue-600">
                        <span class="text-sm ml-2 text-gray-600">Cat</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="categories" class="form-checkbox text-blue-600">
                        <span class="text-sm ml-2 text-gray-600">Dog</span>
                    </label>
                </div>
            </div>

            <div class="mb-6">
                <h3 class="text-sm font-semibold text-gray-600 mb-2">Price Range</h3>
                <div class="space-y-2">
                    <label class="flex items-center">
                        <input type="checkbox" name="price_range" value="0-500000" class="form-checkbox text-blue-600">
                        <span class="text-sm ml-2 text-gray-600">Rp 0 - Rp 500,000</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="price_range" value="500000-1000000"
                            class="form-checkbox text-blue-600">
                        <span class="text-sm ml-2 text-gray-600">Rp 500,000 - Rp 1,000,000</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="price_range" value="1000000-1500000"
                            class="form-checkbox text-blue-600">
                        <span class="text-sm ml-2 text-gray-600">Rp 1,000,000 - Rp 1,500,000</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="price_range" value="1500000-2000000"
                            class="form-checkbox text-blue-600">
                        <span class="text-sm ml-2 text-gray-600">Rp 1,500,000 - Rp 2,000,000</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="price_range" value="2500000-3000000"
                            class="form-checkbox text-blue-600">
                        <span class="text-sm ml-2 text-gray-600">Rp 2,500,000 - Rp 3,000,000</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="price_range" value="3000000-15000000"
                            class="form-checkbox text-blue-600">
                        <span class="text-sm ml-2 text-gray-600">Price > Rp 3,000,000</span>
                    </label>
                </div>
            </div>

            <div class="mb-2 mt-4 flex flex-col items-center justify-center text-center">
                <button id="filterButton"
                    class="w-[85%] bg-blue-500 text-white py-2 rounded hover:bg-blue-700 transition">Apply
                    Filter</button>
            </div>
        </aside>

        <div class="flex-1 max-h-screen overflow-y-auto">
            <h2 class="text-2xl font-semibold text-gray-700 mb-2 pl-3">Your Products</h2>
            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mb-6 overflow-hidden pb-8 pt-4 px-3" id="productGrid">
                @foreach ($products as $product)
                    <a href="{{ route('product.details', $product->id) }}" class="block">
                        <div
                            class="bg-white shadow-lg rounded-lg p-4 hover:shadow-xl transition-all duration-200 hover:-translate-y-[6px] hover:scale-[1.02] group overflow-hidden border border-slate-400">
                            <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}"
                                class="w-full h-48 object-cover rounded-lg mb-4 grayscale-[50%] group-hover:grayscale-0 transition-all duration-200">
                            <div class="flex space-x-2 mb-2">
                                <span
                                    class="bg-gradient-to-r from-teal-500 to-teal-600 text-white text-xs font-semibold rounded-full px-3 py-1">{{ ucwords($product->category) }}</span>
                                <span
                                    class="bg-gradient-to-r from-amber-500 to-amber-600 text-white text-xs font-semibold rounded-full px-3 py-1 truncate">
                                    {{ ucwords($product->species) }}
                                </span>
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
    const popup = document.getElementById('popupMessage');
    const countdown = document.getElementById('countdown');
    let timeLeft = 5;

    if (popup && countdown) {
        const timer = setInterval(() => {
            timeLeft -= 1;
            countdown.textContent = `${timeLeft}s`;

            if (timeLeft <= 0) {
                clearInterval(timer);
                popup.remove();
            }
        }, 1000);
    }




    document.getElementById('filterButton').addEventListener('click', function() {

        const sortBy = document.querySelector('select').value;
        const categories = Array.from(document.querySelectorAll('input[name="categories"]:checked')).map(cb =>
            cb.nextElementSibling.innerText.trim());


        const selectedPriceRanges = Array.from(document.querySelectorAll('input[name="price_range"]:checked'))
            .map(cb => cb.value);


        const priceFilters = selectedPriceRanges.map(priceRange => {
            const prices = priceRange.split('-');
            return {
                priceFrom: prices[0],
                priceTo: prices[1] || prices[0]
            };
        });

        // console.log(sortBy, categories, priceFilters);

        const data = {
            sortBy,
            categories,
            priceFilters
        };

        // console.log(data);



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

                const productGrid = document.getElementById('productGrid');
                productGrid.innerHTML = '';

                if (data.products.length) {
                    data.products.forEach(product => {
                        const productHTML = `
                    <a href="/product/${product.id}" class="block">
                        <div class="bg-white shadow-lg rounded-lg p-4 hover:shadow-xl transition-all duration-200 hover:-translate-y-[6px] hover:scale-[1.02] group overflow-hidden border border-slate-400">
                            <img src="/storage/${product.image_path}" alt="${product.name}" class="w-full h-48 object-cover rounded-lg mb-4 grayscale-[50%] group-hover:grayscale-0 transition-all duration-200">
                            <div class="flex space-x-2 mb-2">
                                <span class="bg-gradient-to-r from-teal-500 to-teal-600 text-white text-xs font-semibold rounded-full px-3 py-1">${product.category}</span>
                                <span class="bg-gradient-to-r from-amber-500 to-amber-600 text-white text-xs font-semibold rounded-full px-3 py-1 truncate ">${product.species}</span>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-800">${product.name}</h3>
                            <p class="text-gray-500 mb-2">Rp ${new Intl.NumberFormat('id-ID').format(product.price)}</p>
                        </div>
                    </a>`;
                        productGrid.insertAdjacentHTML('beforeend', productHTML);
                    });
                } else {
                    productGrid.innerHTML =
                        '<p class="text-center text-gray-500 mt-10">No products match your filters.</p>';
                }
            })
            .catch(error => console.error('Error:', error));
    });
</script>

</html>
