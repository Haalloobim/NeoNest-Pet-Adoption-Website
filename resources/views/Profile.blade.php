<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 min-h-screen">
    <!-- Navbar -->
    <x-navbar title="User Profile" :user="auth()->user()" />

    <div class="container mx-auto px-6 pt-8 mb-6">
        <div class="bg-white shadow-md rounded-lg p-6">
            <!-- User Information -->
            <div class="flex flex-col md:flex-row items-center">
                <!-- Profile Picture -->
                <div class="w-32 h-32 bg-gray-200 rounded-full flex-shrink-0">
                    <img src="{{ asset('images/default.png') }}" alt="Profile Picture"
                        class="max-w-32 max-h-32 object-cover rounded-full">
                </div>
                <!-- User Details -->
                <div class="ml-0 md:ml-6 mt-4 md:mt-0 flex flex-col gap-1 pt-4">
                    <div>
                        <h1 class="text-2xl font-semibold text-gray-800">{{ $user->name }}</h1>
                    </div>
                    <div>
                        <p class="text-gray-600">{{ $user->email }}</p>
                    </div>
                    <div>
                        <span
                            class="bg-gradient-to-r {{ $user->role === 'seller' ? 'from-purple-500 to-purple-600' : 'from-green-500 to-lime-600' }} text-white text-xs font-semibold rounded-full px-3 py-1 mb-4 inline-block">
                            Role: {{ ucwords($user->role) }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Owned Pets Section -->
            @if ($user->role === 'user')
                <div class="mt-8">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Owned Pets</h2>
                    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                        @foreach ($ownedPets as $pet)
                            <div
                                class="bg-white shadow-lg rounded-lg p-4 hover:shadow-xl transition-all duration-200 hover:-translate-y-[6px] hover:scale-[1.02] group overflow-hidden border border-slate-400">
                                <img src="{{ asset('storage/' . $pet->image_path) }}" alt="{{ $pet->name }}"
                                    class="w-full h-44 object-cover rounded-lg mb-4 grayscale-[50%] group-hover:grayscale-0 transition-all duration-200">

                                <h3 class="text-lg font-semibold text-gray-800">{{ $pet->name }}</h3>
                            </div>
                        @endforeach
                    </div>

                    @if (count($ownedPets) === 0)
                        <p class="text-center text-gray-500 mt-4">No pets owned yet.</p>
                    @endif
                </div>
            @endif
            @if ($user->role === 'seller')
                <div class="mt-8">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Sold Pets:</h2>
                    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                        @foreach ($soldProducts as $pets)
                            <div
                                class="bg-white shadow-lg rounded-lg p-4 hover:shadow-xl transition-all duration-200 hover:-translate-y-[6px] hover:scale-[1.02] group overflow-hidden border border-slate-400">
                                <img src="{{ asset('storage/' . $pets->image_path) }}" alt="{{ $pets->name }}"
                                    class="w-full h-44 object-cover rounded-lg mb-4 grayscale-[50%] group-hover:grayscale-0 transition-all duration-200">

                                <h3 class="text-lg font-semibold text-gray-800">{{ $pets->name }}</h3>
                            </div>
                        @endforeach
                    </div>

                    @if (count($soldProducts) === 0)
                        <p class="text-center text-gray-500 mt-4">No pets sold yet.</p>
                    @endif
                </div>
            @endif
        </div>
    </div>
</body>

</html>
