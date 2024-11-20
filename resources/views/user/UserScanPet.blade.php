<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scan Pet</title>
    @vite('resources/css/app.css')
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-50">
    <div class="w-full max-w-lg p-8 space-y-6 bg-white shadow-lg rounded-xl">
        <h2 class="text-2xl font-bold text-center text-gray-700">Scan Your Pet</h2>

        <!-- Form to upload a new pet image -->
        <form action="{{ route('upload.pet') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">Upload Pet Image</label>
                <input type="file" id="image" name="image" required
                    class="block w-full px-4 py-2 mt-1 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500">
            </div>
            <button type="submit"
                class="w-full max-w-xs px-4 py-2 mx-auto text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:bg-blue-800 focus:ring focus:ring-blue-300">
                Upload Pet
            </button>
        </form>

        <!-- Display scanned result if available -->
        @isset($data)
            <div class="space-y-4">
                <h3 class="text-xl font-semibold text-gray-700">Scan Result</h3>
                <p><strong>Category:</strong> {{ $data['category'] }}</p>
                <p><strong>Species:</strong> {{ $data['species'] }}</p>
            </div>

            <!-- Display recommended products -->
            <div class="space-y-4">
                <h3 class="text-xl font-semibold text-gray-700">Related Pets</h3>
                @if ($data['products']->isEmpty())
                    <p class="text-gray-600">No pets available for this category and species.</p>
                @else
                    <ul class="space-y-3">
                        @foreach ($data['products'] as $product)
                            <li class="p-4 bg-gray-50 border border-gray-300 rounded-lg shadow-sm max-w-md mx-auto">
                                <h4 class="text-lg font-medium text-gray-800">{{ $product->name }}</h4>
                                <p class="text-gray-600"><strong>Price:</strong> Rp {{ $product->price }}</p>
                                <p class="text-gray-600"><strong>Description:</strong> {{ $product->description }}</p>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        @endisset
    </div>
</body>

</html>
