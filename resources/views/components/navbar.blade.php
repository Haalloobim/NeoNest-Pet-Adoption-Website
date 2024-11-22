<!-- resources/views/components/navbar.blade.php -->

<script>
    function toggleDropdown() {
        const dropdown = document.getElementById('dropdownMenu');
        dropdown.classList.toggle('hidden');
    }
</script>

<nav class="bg-white shadow-md">
    <div class="container mx-auto px-6 py-2 flex justify-between items-center">
        <div class="flex items-center space-x-4 cursor-pointer" onclick="window.location='{{ route('dashboard') }}'">
            <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="h-16 w-auto">
        </div>
        

        <div class="text-center">
            <h1 class="text-2xl font-bold text-blue-600">{{ $title }}</h1>
        </div>

        <div class="relative z-40">
            <button onclick="toggleDropdown()" class="focus:outline-none">
                <img src="{{ asset('images/default.png') }}" alt="Profile Picture" class="h-12 w-auto rounded-full">
            </button>
            <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg">
                <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-gray-600 hover:bg-gray-100">Dashboard</a>
                
                @if ($user && $user->role === 'seller')
                    <a href="{{ route('upload') }}" class="block px-4 py-2 text-gray-600 hover:bg-gray-100">Upload Product</a>
                @elseif ($user && $user->role === 'user')
                    <a href="#" class="block px-4 py-2 text-gray-600 hover:bg-gray-100">Scan Product</a>
                @endif
                
                <a href="{{ route('profile') }}" class="block px-4 py-2 text-gray-600 hover:bg-gray-100">Account</a>
                <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="block w-full text-left px-4 py-2 text-gray-600 hover:bg-gray-100">Logout</button>
                </form>
            </div>
        </div>
    </div>
</nav>
