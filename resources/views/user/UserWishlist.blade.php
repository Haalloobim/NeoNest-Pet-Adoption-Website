<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-50">
    <x-navbar title="Wishlist" :user="auth()->user()" />
    <div
        class="max-w-5xl mx-auto p-4 space-y-4 {{ $wishlist->isEmpty() ? 'flex justify-center items-center min-w-full' : '' }}">
        @foreach ($wishlist as $product)
            <div
                class="bg-white shadow-md rounded-lg p-4 flex items-center space-x-4 hover:shadow-xl hover:scale-105 transition-transform duration-300 ease-in-out">
                <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}"
                    class="w-48 h-32 object-cover rounded-lg transition-all duration-300 ease-in-out" />

                <div class="flex-1">
                    <h3 class="text-lg font-semibold text-gray-800">{{ $product->name }}</h3>
                    <p class="text-gray-500 text-sm">{{ $product->description }}</p>
                    <p class="text-gray-700 font-medium mt-2">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                </div>

                <div class="flex space-x-2">
                    <a href="{{ route('product.details', $product->id) }}"
                        class="bg-teal-500 text-white px-3 py-1 rounded-full text-sm hover:bg-teal-600 transition-colors duration-300 ease-in-out">
                        View
                    </a>
                    <form action="{{ route('wishlist.remove', $product->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="bg-red-500 text-white px-3 py-1 rounded-full text-sm hover:bg-red-600 transition-colors duration-300 ease-in-out">
                            Remove from Wishlist
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
        <div class="py-5">
            @if ($wishlist->isEmpty())
                <p class="text-center text-gray-500 pt-48 text-xl font-medium">
                    No products in wishlist, back to
                    <a href="{{ route('dashboard') }}"
                        class="font-semibold bg-gradient-to-r from-cyan-600 to-blue-700 text-transparent bg-clip-text hover:from-cyan-700 hover:to-blue-800">
                        Dashboard
                    </a>
                </p>
            @endif
        </div>
    </div>
</body>


</html>
