<!-- make light blue -->
<nav class="bg-blue-600 p-4 shadow-lg">
    <div class="container mx-auto flex justify-between items-center">
        <a href="#" class="text-black text-xl font-semibold">AdoptSIWD</a>
        <div>
            <a href="#" class="text-black px-4">Home</a>
            <a href="#" class="text-black px-4">About</a>
            <a href="#" class="text-black px-4">Contact</a>
            <!-- logout -->
            <a href="#" onclick="logout()" class="text-black px-4">Logout</a>
        </div>
    </div>
</nav>

<script>
    function logout() {
        fetch('{{ route('logout') }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            }
        }).then(() => {
            window.location.href = '{{ route('login') }}';
        });
    }
</script>
