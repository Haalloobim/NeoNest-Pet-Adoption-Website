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
    <x-navbar title="Product Details" />

    <!-- Product Details Content -->
    <div class="container mx-auto px-6 py-8">
        <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
            <!-- Product Image -->
            <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}"
                class="w-full h-72 object-cover">

            <div class="p-8 text-center">
                <!-- Product Title -->
                <h2 class="text-3xl font-semibold text-gray-900">{{ $product->name }}</h2>
                <p class="text-xl text-slate-600 font-bold mt-1">Rp {{ number_format($product->price, 0, ',', '.') }}
                </p>
                <span
                    class="inline-block mt-2 px-4 py-1 text-sm font-semibold text-white rounded-full 
        {{ $product->product_status === 'available' ? 'bg-gradient-to-r from-green-500 to-lime-600' : 'bg-gradient-to-r from-red-500 to-orange-500' }}">
                    {{ ucwords($product->product_status) }}
                </span>

                <!-- Separator -->
                <div class="flex justify-center items-center">
                    <hr class="my-6 border-gray-300 w-[85%]">
                </div>


                <!-- Product Description -->
                <p class="text-gray-600 leading-relaxed">{{ $product->description }}</p>

                <!-- Separator -->
                <div class="flex justify-center items-center">
                    <hr class="my-6 border-gray-300 w-[85%]">
                </div>


                <!-- Category and Species -->
                <div class="flex justify-center space-x-16 mt-1">
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
                <div class="flex justify-center items-center">
                    <hr class="my-6 border-gray-300 w-[85%]">
                </div>


                <!-- Back Button -->
                <div class="mt-8 flex flex-row gap-x-5 justify-center items-center">
                    <div>
                        <a href="{{ route('dashboard') }}"
                            class="px-6 py-2 text-gray-600 bg-gray-200 rounded-full hover:bg-gray-300 transition">
                            Back to Dashboard
                        </a>
                    </div>
                    @if ($user && $user->role === 'seller')
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
                    @elseif ($user && $user->role === 'user')
                    <!-- Add to Wishlist Button -->
                    <!-- if the user doesnt set this following product to their wishtlist make it clickable, but if already set this product to wishlist make it as remove from wishlist-->
                    @if ($product->wishlistedBy()->where('user_id', $user->id)->exists())
                    <div>
                        <form action="{{ route('wishlist.remove', ['product' => $product->id]) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-6 py-[7px] text-white bg-gradient-to-tr from-red-500 to-orange-700 rounded-full hover:from-red-600 hover:to-orange-800 transition-all duration-300 ease-in-out">
                                Remove from Wishlist
                            </button>
                        </form>
                    </div>
                    @else
                    <div>
                        <form action="{{ route('wishlist.add', ['product' => $product->id]) }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="px-6 py-[7px] text-white bg-gradient-to-r from-teal-500 to-blue-600 rounded-full hover:from-teal-600 hover:to-blue-700 transition-all duration-300 ease-in-out">
                                Add to Wishlist
                            </button>
                        </form>
                    </div>
                    @endif


                    @if (!$product->cartedBy()->where('user_id', $user->id)->exists())
                    <div>
                        <form action="{{ route('cart.add', ['product' => $product->id]) }}" method="POST">
                            @csrf
                            <button type="submit"
                            class="px-6 py-2 text-white bg-gradient-to-r from-teal-500 to-blue-600 rounded-full hover:from-teal-600 hover:to-blue-700 transition-all duration-300 ease-in-out">
                                Add to Cart
                            </button>
                        </form>
                    </div>
                    @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>

</html>