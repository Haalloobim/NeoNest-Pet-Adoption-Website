<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scan Pet</title>
    @vite('resources/css/app.css')
</head>


<body class=" bg-gray-50">
    <x-navbar title="Scan Pet" :user="auth()->user()" />
    <div class="flex items-center justify-center min-h-screen my-6">
        <div class="{{ isset($data) ? 'w-[90%]' : 'max-w-xl w-full' }} p-8 space-y-6 bg-white shadow-lg rounded-xl">

            <h2 class="text-2xl font-bold text-center text-gray-700">Scan Your Pet</h2>

            <form action="{{ route('upload.pet') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700">Upload Pet Image</label>
                    <input type="file" id="image" name="image" required
                        class="block w-full px-4 py-2 mt-1 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500">
                </div>
                <button type="submit"
                    class="w-full px-4 py-2 mx-auto text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:bg-blue-800 focus:ring focus:ring-blue-300">
                    Upload Pet
                </button>
            </form>

            <div class="mt-8 space-y-4">
                <h3 class="text-xl font-semibold text-gray-700">How to Use</h3>
                <ol class="list-decimal list-inside space-y-4">
                    <li class="flex items-start space-x-4">
                        <img src="{{ asset('images/howto_step1.png') }}" alt="Step 1" class="w-20 h-20 rounded-lg border">
                        <p class="text-gray-600">
                            <strong>Step 1:</strong> Click on the "Choose File" button to select an image of your pet from your device.
                        </p>
                    </li>
                    <li class="flex items-start space-x-4">
                        <img src="{{ asset('images/howto_step2.png') }}" alt="Step 2" class="w-20 h-20 rounded-lg border">
                        <p class="text-gray-600">
                            <strong>Step 2:</strong> Ensure the image is clear and well-lit, then click on the "Upload Pet" button.
                        </p>
                    </li>
                    <li class="flex items-start space-x-4">
                        <img src="{{ asset('images/howto_step3.png') }}" alt="Step 3" class="w-20 h-20 rounded-lg border">
                        <p class="text-gray-600">
                            <strong>Step 3:</strong> Wait for the system to process the image and display the scan results.
                        </p>
                    </li>
                </ol>
            </div>


            @isset($data)
                <div class="space-y-4">
                    <h3 class="text-xl font-semibold text-gray-700">Scan Result</h3>
                    <p>
                        <strong>Category:</strong>
                        <span
                            class="bg-gradient-to-r from-teal-500 to-teal-600 text-white text-xs font-semibold rounded-full px-3 py-1">
                            {{ ucwords($data['category']) }}
                        </span>
                    </p>
                    <p>
                        <strong>Species:</strong>
                        <span
                            class="bg-gradient-to-r from-amber-500 to-amber-600 text-white text-xs font-semibold rounded-full px-3 py-1 truncate">
                            {{ ucwords($data['species']) }}
                        </span>
                    </p>
                </div>

                <div class="space-y-4">
                    <h3 class="text-xl font-semibold text-gray-700">Related Pets</h3>
                    @if ($data['products']->isEmpty())
                        <p class="text-gray-600">No pets available for this category and species.</p>
                    @else
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-6">
                            @foreach ($data['products'] as $product)
                            <a href="{{ route('product.details', $product->id) }}" class="block">
                                <div class="p-4 bg-gray-50 border border-gray-300 rounded-lg shadow-sm hover:shadow-xl hover:scale-[1.01] hover:-translate-y-[2px] transition-all duration-150 ease-in-out">
                                    <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}"
                                        class="w-full h-48 object-cover rounded-lg">
                                    <h4 class="text-lg font-medium text-gray-800 mt-2">{{ $product->name }}</h4>
                                    <p class="text-gray-600"><strong>Price:</strong> Rp {{ $product->price }}</p>
                                    <p class="text-gray-600"><strong>Description:</strong> {{ $product->description }}</p>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endisset
        </div>
    </div>
</body>


</html>
