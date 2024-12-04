<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gradient-to-r from-blue-50 via-purple-50 to-pink-50">
    <!-- Include the navbar -->
    <x-navbar title="Dashboard" :user="auth()->user()"/>

    <div class="flex flex-col items-center min-h-screen p-6 space-y-12">
        <!-- Welcome Section -->
        <div class="w-full max-w-4xl p-8 bg-gradient-to-r from-purple-500 via-pink-500 to-orange-500 shadow-lg rounded-xl text-center text-white">
            <h2 class="text-3xl font-bold">Welcome, {{ auth()->user()->name }}</h2>
            <p class="mt-2 text-lg">Your personalized dashboard to manage your pet adoption journey!</p>
        </div>

        <!-- Dashboard Actions -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 w-full max-w-4xl">
            <!-- Action: List Pet for Adoption -->
            <div class="flex flex-col bg-white shadow-lg rounded-lg p-6 space-y-4 hover:shadow-xl transform hover:scale-105 transition">
                <h3 class="text-lg font-bold text-blue-700">List Pet for Adoption</h3>
                <p class="text-sm text-gray-600">Explore all the available pets looking for a new home. Find your perfect companion today!</p>
                <a href='{{ route('products.showAll') }}' class="w-full block px-4 py-2 text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                    View Pets
                </a>
            </div>

            <!-- Action: Wishlist -->
            <div class="flex flex-col bg-white shadow-lg rounded-lg p-6 space-y-4 hover:shadow-xl transform hover:scale-105 transition">
                <h3 class="text-lg font-bold text-pink-700">List of Wishlist</h3>
                <p class="text-sm text-gray-600">Keep track of the pets you are interested in. Save them to your wishlist for easy access later.</p>
                <a href='{{ route('wishlist.show') }}' class="w-full block px-4 py-2 text-center text-white bg-pink-600 rounded-lg hover:bg-pink-700">
                    View Wishlist
                </a>
            </div>

            <!-- Action: Cart -->
            <div class="flex flex-col bg-white shadow-lg rounded-lg p-6 space-y-4 hover:shadow-xl transform hover:scale-105 transition">
                <h3 class="text-lg font-bold text-green-700">List of Cart</h3>
                <p class="text-sm text-gray-600">Manage your adoption process by checking out the pets you’ve added to your cart.</p>
                <a href='{{ route('cart.show') }}' class="w-full block px-4 py-2 text-center text-white bg-green-600 rounded-lg hover:bg-green-700">
                    View Cart
                </a>
            </div>

            <!-- Action: View Adopted Pet -->
            <div class="flex flex-col bg-white shadow-lg rounded-lg p-6 space-y-4 hover:shadow-xl transform hover:scale-105 transition">
                <h3 class="text-lg font-bold text-purple-700">View Adopted Pet</h3>
                <p class="text-sm text-gray-600">See the pets you’ve successfully adopted and cherish your new family members.</p>
                <a href='{{ route('adoptedPets.show') }}' class="w-full block px-4 py-2 text-center text-white bg-purple-600 rounded-lg hover:bg-purple-700">
                    View Adopted Pets
                </a>
            </div>

            <!-- Action: Scan Pet -->
            <div class="flex flex-col bg-white shadow-lg rounded-lg p-6 space-y-4 hover:shadow-xl transform hover:scale-105 transition">
                <h3 class="text-lg font-bold text-orange-700">Scan Pet</h3>
                <p class="text-sm text-gray-600">Scan your pet's QR code to quickly access its profile, medical history, and more.</p>
                <a href='{{ route('scanningPet.show') }}' class="w-full block px-4 py-2 text-center text-white bg-orange-600 rounded-lg hover:bg-orange-700">
                    Scan Now
                </a>
            </div>
        </div>

        <!-- Additional Info Section -->
        <div class="w-full max-w-4xl p-8 bg-gradient-to-r from-green-400 via-teal-400 to-blue-400 shadow-lg rounded-xl text-center text-white">
            <h3 class="text-2xl font-bold mb-4">What You Can Do Here</h3>
            <p class="text-lg">
                This dashboard is your gateway to managing your pet adoption experience. Browse available pets, keep track of your favorites, manage your adoption process, and explore your adopted pet’s details.
                Scan your pet’s QR code for quick access to their profile and history!
            </p>
        </div>
    </div>
</body>

</html>
