<nav class="bg-white shadow-md">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-blue-600">Dashboard</h1>
        <ul class="flex space-x-4">
            <li><a href="{{ route('upload') }}" class="text-gray-600 hover:text-blue-600">Upload Product</a></li>
            <li><a href="#account-details" class="text-gray-600 hover:text-blue-600">Account</a></li>
            <li><a href="{{ route('logout') }}" class="text-gray-600 hover:text-blue-600">Logout</a></li>
        </ul>
    </div>
</nav>