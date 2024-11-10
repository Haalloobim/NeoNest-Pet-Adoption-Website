<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pet Details</title>
    @vite('resources/css/app.css')
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-50">
    <div class="w-full max-w-md p-8 space-y-4 bg-white shadow-lg rounded-xl">
        <h2 class="text-2xl font-bold text-center text-gray-700 mb-6">Edit Pet Details</h2>

        <!-- Success or Error Message -->
        @if (session('success'))
            <div class="text-green-600 font-medium text-center">{{ session('success') }}</div>
        @elseif (session('error'))
            <div class="text-red-600 font-medium text-center">{{ session('error') }}</div>
        @endif

        <!-- Form to Edit Product Details -->
        <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Pet Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" required
                    class="block w-full px-4 py-2 mt-1 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500">
            </div>

            <div>
                <label for="price" class="block text-sm font-medium text-gray-700">Price (Rp)</label>
                <input type="number" id="price" name="price" value="{{ old('price', $product->price) }}" required
                    class="block w-full px-4 py-2 mt-1 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500">
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea id="description" name="description" rows="4" required
                    class="block w-full px-4 py-2 mt-1 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500">{{ old('description', $product->description) }}</textarea>
            </div>

            <!-- Optional Field for Category Specification -->
            <div id="other-category-field" style="display: none;">
                <label for="other_category" class="block text-sm font-medium text-gray-700">Specify Category</label>
                <input type="text" id="other_category" name="other_category" value="{{ old('other_category', $product->other_category ?? '') }}"
                    class="block w-full px-4 py-2 mt-1 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500">
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:bg-blue-800 focus:ring focus:ring-blue-300">
                Save Changes
            </button>
        </form>
    </div>
</body>

</html>
