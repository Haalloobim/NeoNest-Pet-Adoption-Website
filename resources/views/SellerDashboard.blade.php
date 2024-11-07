<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Dashboard</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 min-h-screen">
    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-blue-600">Dashboard</h1>
            <ul class="flex space-x-4">
                <li><a href="{{ route('uploads') }}" class="text-gray-600 hover:text-blue-600">Upload Product</a></li>
                <li><a href="#account-details" class="text-gray-600 hover:text-blue-600">Account</a></li>
                <li><a href="#" class="text-gray-600 hover:text-blue-600">Logout</a></li>
            </ul>
        </div>
    </nav>

    <!-- Account Details -->
    <div id="account-details" class="container mx-auto px-6 py-8">
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">Account Details</h2>
        <div class="bg-white shadow-lg rounded-lg p-6 flex items-center space-x-6">
            <!-- Profile Picture -->
            {{-- <div class="w-24 h-24 rounded-full overflow-hidden bg-gray-200">
                <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" class="w-full h-full object-cover">
            </div> --}}
            
            <!-- User Details -->
            <div>
                <h3 class="text-xl font-semibold text-gray-800">{{ $user->name }}</h3>
                <p class="text-gray-500">{{ $user->email }}</p>
                <p class="text-gray-500">Joined on {{ $user->created_at->format('F j, Y') }}</p>
                {{-- <a href="{{ route('account.edit') }}" 
                   class="mt-4 inline-block px-4 py-2 text-sm text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                    Edit Account
                </a> --}}
            </div>
        </div>
    </div>

    <!-- Product Grid -->
    <div class="container mx-auto px-6 py-8">
        <h2 class="text-2xl font-semibold text-gray-700 mb-6">Your Products</h2>

        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach ($products as $product)
            <a href="{{ route('product.details', $product->id) }}" class="block">
                <div class="bg-white shadow-lg rounded-lg p-4 hover:shadow-xl transition-shadow">
                    <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}"
                        class="w-full h-48 object-cover rounded-lg mb-4">
                    <h3 class="text-lg font-semibold text-gray-800">{{ $product->name }}</h3>
                    <p class="text-gray-500 mb-2">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    <p class="text-gray-600 mb-4">{{ Str::limit($product->description, 60) }}</p>
                    {{-- <a href="{{ route('product.edit', $product->id) }}"
                        class="inline-block px-4 py-2 text-sm text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                        Edit
                    </a> --}}
                </div>
            </a>
            @endforeach
        </div>

        <!-- No Products Message -->
        @if ($products->isEmpty())
            <p class="text-center text-gray-500 mt-10">You have no products listed for sale.</p>
        @endif
    </div>
</body>

</html>
