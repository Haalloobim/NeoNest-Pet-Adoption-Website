<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Pet</title>
    @vite('resources/css/app.css')
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-50">
    <div class="w-full max-w-md p-8 space-y-4 bg-white shadow-lg rounded-xl">
        <h2 class="text-2xl font-bold text-center text-gray-700 mb-6">Upload New Pet</h2>

        <!-- Success or Error Message -->
        @if (session('success'))
            <div class="text-green-600 font-medium text-center">{{ session('success') }}</div>
        @elseif (session('error'))
            <div class="text-red-600 font-medium text-center">{{ session('error') }}</div>
        @endif

        <form action="{{ route('product.upload') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Pet Name</label>
                <input type="text" id="name" name="name" required
                    class="block w-full px-4 py-2 mt-1 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500">
            </div>

            <div>
                <label for="price" class="block text-sm font-medium text-gray-700">Price (Rp)</label>
                <input type="number" id="price" name="price" required
                    class="block w-full px-4 py-2 mt-1 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500">
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea id="description" name="description" rows="4" required
                    class="block w-full px-4 py-2 mt-1 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500"></textarea>
            </div>

            <div id="other-category-field" style="display: none;">
                <label for="other_category" class="block text-sm font-medium text-gray-700">Specify Category</label>
                <input type="text" id="other_category" name="other_category"
                    class="block w-full px-4 py-2 mt-1 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500">
            </div>

            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">Product Image</label>
                <input type="file" id="image" name="image" required
                    class="block w-full px-4 py-2 mt-1 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500">
            </div>

            <button type="submit"
                class="w-full px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:bg-blue-800 focus:ring focus:ring-blue-300">
                Upload Product
            </button>
        </form>
    </div>

    
</body>

</html>
