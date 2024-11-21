<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neo Nest Landing Page</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
</head>

<body class="bg-gray-100 min-w-full max-w-screen-lg">

    <!-- Sliding Image Section -->
    <section class="relative w-[80%] max-w-5xl mx-auto my-8">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="{{ asset('images/welcome1.jpg') }}" alt="Welcome Image 1"
                        class="w-auto h-64 object-cover rounded-lg"></div>
                <div class="swiper-slide"><img src="{{ asset('images/welcome2.jpg') }}" alt="Welcome Image 2"
                        class="w-auto h-64 object-cover rounded-lg"></div>
                <div class="swiper-slide"><img src="{{ asset('images/welcome3.jpg') }}" alt="Welcome Image 3"
                        class="w-auto h-64 object-cover rounded-lg"></div>
                <div class="swiper-slide"><img src="{{ asset('images/welcome4.jpg') }}" alt="Welcome Image 4"
                        class="w-auto h-64 object-cover rounded-lg"></div>
            </div>
            <!-- Swiper Navigation -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>

    <!-- Brief Explanation -->
    <section class="text-center my-8 max-w-3xl mx-auto">
        <h2 class="text-2xl font-semibold text-gray-800">Welcome to Neo Nest Pet Adoption</h2>
        <p class="text-gray-600 mt-4">Neo Nest is a welcoming online platform dedicated to connecting families with pets
            in need of a loving home. The name "Neo Nest" blends "Neo," meaning "new" in Greek, and "Nest," symbolizing
            a safe and nurturing home. The website offers a seamless adoption experience, allowing potential pet owners
            to browse through various furry companions, read reviews, and learn about each pet's personality. Neo Nest
            aims to provide a fresh start for animals and families alike, making it easier to find the perfect match and
            create a lifelong bond.</p>
    </section>

    <!-- User Review Holder -->
    <section class="my-8 max-w-5xl mx-auto">
        <h3 class="text-center text-xl font-semibold text-gray-800 mb-4">User Reviews</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white shadow-md rounded-lg p-6 text-center border-t-2 border-orange-600">
                <p class="text-gray-600">"The team at Neo Nest provided exceptional service and helped me find the
                    perfect pet for my family. The selection of pets was incredible, and they really took the time to
                    understand what I was looking for. Highly recommended for anyone searching for a new furry friend!"
                </p>
                <p class="text-gray-500 mt-4">- John Doe</p>
            </div>
            <div class="bg-white shadow-md rounded-lg p-6 text-center border-t-2 border-cyan-500">
                <p class="text-gray-600">"I found the perfect puppy at Neo Nest! The adoption process was seamless, and
                    the staff was so patient in answering all my questions. They truly care about each pet's well-being
                    and go above and beyond to make sure pets find a loving home. I'm so grateful for this experience!"
                </p>
                <p class="text-gray-500 mt-4">- Jane Smith</p>
            </div>
            <div class="bg-white shadow-md rounded-lg p-6 text-center border-t-2 border-lime-600">
                <p class="text-gray-600">"I adopted my cat from Neo Nest, and it was love at first sight! The adoption
                    process was smooth and easy, and the staff was incredibly helpful. My cat has brought so much joy
                    into my life, and I can't thank Neo Nest enough for helping me find my perfect companion!"</p>
                <p class="text-gray-500 mt-4">- Sarah Brown</p>
            </div>
        </div>
    </section>

    <!-- Example Product Card -->
    <section class="my-8 max-w-5xl mx-auto">
        <h3 class="text-center text-xl font-semibold text-gray-800 mb-4">Featured Pets</h3>
        <div class="flex flex-row gap-6items-center justify-between">
            <!-- Replace with dynamic content as needed -->
            @foreach ($products as $pet)
                <div class="bg-white shadow-lg rounded-lg p-4 hover:shadow-xl transition-shadow">
                    <img src="{{ $pet['image_path'] }}" alt="Example Pet"
                        class="w-full h-48 object-cover rounded-lg mb-4">
                    <h4 class="text-lg font-semibold text-gray-800">{{ $pet['name'] }}</h4>
                    <p class="text-gray-500 mt-2">Rp {{ number_format($pet['price'], 0, ',', '.') }}</p>
                </div>
                <!-- Additional cards as needed -->
            @endforeach
        </div>
    </section>

    <!-- Registration Prompt -->
    <section class="text-center my-8 max-w-3xl mx-auto">
        <h4 class="text-xl font-semibold text-gray-800">Join NeoNest Today</h4>
        <p class="text-gray-600 mt-4">To access more information and adopt your new best friend, please
            <a href="/register" class="text-blue-600 hover:text-blue-800">register</a>
            or
            <a href="/login" class="text-blue-600 hover:text-blue-800">log in</a>
            first.
        </p>
    </section>

    <!-- Swiper.js Initialization -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.swiper-container', {
            loop: true,
            centeredSlides: true,
            slidesPerView: 2, // Shows part of the next slide for a centered effect
            spaceBetween: 0, // Removes space between slides
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            breakpoints: {
                768: {
                    slidesPerView: 1.5,
                    spaceBetween: 5,
                },
                1024: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                }
            }
        });
    </script>
</body>

</html>
