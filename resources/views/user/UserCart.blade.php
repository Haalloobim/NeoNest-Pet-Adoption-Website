<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-50">
    <x-navbar title="Carts" :user="auth()->user()" />
    <div class="max-w-5xl mx-auto p-4 space-y-4">
        @foreach ($cart as $product)
        <div
            class="bg-white shadow-md rounded-lg p-4 flex items-center space-x-4 hover:shadow-xl hover:scale-105 transition-transform duration-300 ease-in-out">
            <img
                src="{{ asset('storage/' . $product->image_path) }}"
                alt="{{ $product->name }}"
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
                <form action="{{ route('cart.remove', $product->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="bg-red-500 text-white px-3 py-1 rounded-full text-sm hover:bg-red-600 transition-colors duration-300 ease-in-out">
                        Remove
                    </button>
                </form>
            </div>
        </div>
        @endforeach

        @if (count($cart) > 0)
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 p-4 bg-white rounded-lg shadow">
            <div class="flex-1">
                <h3 class="text-lg font-semibold text-gray-800">Total Price</h3>
                <p class="text-gray-700 font-medium">Rp {{ number_format($total, 0, ',', '.') }}</p>
            </div>
            <a href="{{ route('cart.checkout') }}"
                class="flex-shrink-0 bg-blue-500 text-white px-5 py-2 rounded-lg text-sm hover:bg-blue-600 transition-colors duration-300 ease-in-out shadow">
                Checkout
            </a>
        </div>
        @else
        <div class="flex justify-center items-center h-[75dvh]">
            <div class="text-center">
                <h3 class="text-xl font-semibold text-gray-800">Cart is Empty</h3>
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