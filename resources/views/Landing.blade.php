<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neo Nest Landing Page</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-white ">
    <header class="fixed top-0 z-20 w-full">
        <nav class="2lg:px-12 mx-auto max-w-7xl px-6 py-12 lg:px-12 xl:px-6 2xl:px-0">
            <div class="flex items-center justify-between">
                <a href="/" class="text-2xl font-light tracking-widest text-black">
                    <img src="/images/logo.png" alt="" class="tracking-widest w-24 h-24">
                </a>
                <div class="flex items-center gap-6">
                    <a href="/register" class="relative py-1.5 text-black before:absolute before:inset-0 before:origin-bottom before:scale-y-[.03] before:bg-white/60 before:transition before:duration-300 hover:before:scale-y-100 hover:before:scale-x-125 hover:before:bg-white/10">
                        <span class="relative">Register</span>
                    </a>
                    <a href="/login" class="relative py-1.5 text-black before:absolute before:inset-0 before:origin-bottom before:scale-y-[.03] before:bg-white/60 before:transition before:duration-300 hover:before:scale-y-100 hover:before:scale-x-125 hover:before:bg-white/10">
                        <span class="relative">Login</span>
                    </a>
                </div>
            </div>
        </nav>
    </header>
    <main class="background relative ">
        <section id="home" class="relative flex min-h-screen items-center select-none">
            <div aria-hidden="true" class="absolute inset-0 z-[1] bg-gradient-to-b from-white/10 via-white/20 to-white"></div>
            <img src="/images/welcome.jpg" class="fixed inset-0 h-dvh w-full object-cover" width="4160" height="6240">
            <div class="relative z-10 mx-auto max-w-7xl px-6 pb-40 pt-60 lg:px-12 xl:px-6 2xl:px-0">
                <div class="pb-12 media-h:md:pb-32 media-h:lg:pb-12 xl:pb-12 ">
                    <h1 data-rellax-speed="-3" data-rellax-xs-speed="0" data-rellax-mobile-speed="0" class="rellax text-6xl font-bold text-black sm:text-8xl md:text-9xl xl:leading-tight">Neo Nest</h1>
                </div>
                <div>
                    <div class="ml-auto md:w-2/3 md:pt-12 lg:w-1/2">
                        <p class="mb-20 text-lg font-light text-black sm:text-2xl xl:leading-normal">Find your perfect furry friend with NeoNest! Adopt cats and dogs online easily, with detailed profiles and full support for a smooth process. 🐾</p>
                        <a data-rellax-speed="1" data-rellax-xs-speed="0" data-rellax-mobile-speed="0" href="#pets" class="rellax relative inline-block py-1.5 text-black before:absolute before:inset-0 before:origin-bottom before:scale-y-[.03] before:bg-white/60 before:transition before:duration-300 hover:before:scale-y-100 hover:before:scale-x-125 hover:before:bg-white/10">
                            <span class="relative">See our pets</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section id="pets" class="relative z-20 bg-white pb-10 lg:pt-0">
            <div class="mx-auto max-w-7xl px-6 lg:px-12 xl:px-6 xl:pb-16">
                <div data-rellax-speed="-3" data-rellax-xs-speed="0" data-rellax-mobile-speed="0" class="rellax flex flex-wrap items-center gap-6">
                    <h2 class="text-5xl font-bold text-black xl:text-7xl">Our pets</h2>
                    <span class="h-max rounded-full border border-black/40 px-2 py-1 text-xs tracking-wider text-black mt-10">Over 30+ Species!</span>
                </div>
                <div class="relative mt-20 gap-20 gap-x-6 space-y-20 sm:grid sm:grid-cols-2 sm:space-y-0 md:mt-30 lg:mt-50">
                    <a class="rellax rounded-lg group col-span-2 lg:col-span-1" data-rellax-mobile-speed="0" data-rellax-speed="-2" data-rellax-tablet-speed="0" data-rellax-xs-speed="0" href="/showAllProducts">
                        <div class="relative before:absolute before:inset-0 before:origin-top before:bg-gradient-to-t before:from-white/5 before:opacity-50 before:backdrop-grayscale before:transition before:duration-500 group-hover:before:origin-bottom group-hover:before:scale-y-0">
                            <img class="transition rounded-lg duration-500" src="/images/havanese_dog.jpg" width="1000" height="666">
                            <div class="absolute inset-0 flex rounded-lg items-center justify-center text-white opacity-0 group-hover:opacity-100 bg-black bg-opacity-50 transition-opacity">
                                <p class="text-lg font-light text-white sm:text-2xl xl:leading-normal">See More</p>
                            </div>
                        </div>
                        <div class="flex items-center justify-between p-4">
                            <h3 class="text-2xl font-normal text-black">Barry</h3>
                            <span class="h-max rounded-full border border-white/30 px-2 py-1 text-xs tracking-wider text-black">Havanese Dog</span>
                        </div>
                    </a>
                    <a class="rellax rounded-lg group block" data-rellax-mobile-speed="0" data-rellax-speed="1" data-rellax-tablet-speed="0" data-rellax-xs-speed="0" href="/showAllProducts">
                        <div class="relative before:absolute before:inset-0 before:origin-top before:bg-gradient-to-t before:from-white/5 before:opacity-50 before:backdrop-grayscale before:transition before:duration-500 group-hover:before:origin-bottom group-hover:before:scale-y-0">
                            <img class="transition rounded-lg duration-500" src="/images/persian_cat.jpg" width="1380" height="920">
                            <div class="absolute inset-0 flex rounded-lg items-center justify-center text-white opacity-0 group-hover:opacity-100 bg-black bg-opacity-50 transition-opacity">
                                <p class="text-lg font-light text-white sm:text-2xl xl:leading-normal">See More</p>
                            </div>
                        </div>
                        <div class="flex items-center justify-between p-4">
                            <h3 class="text-2xl font-normal text-black">Albireo</h3>
                            <span class="h-max rounded-full border border-white/30 px-2 py-1 text-xs tracking-wider text-black">Persian Cat</span>
                        </div>
                    </a>
                    <a class="rellax rounded-lg group block" data-rellax-mobile-speed="0" data-rellax-speed="-2" data-rellax-tablet-speed="0" data-rellax-xs-speed="0" href="/showAllProducts">
                        <div class="relative before:absolute before:inset-0 before:origin-top before:bg-gradient-to-t before:from-white/5 before:opacity-50 before:backdrop-grayscale before:transition before:duration-500 group-hover:before:origin-bottom group-hover:before:scale-y-0">
                            <img class="transition rounded-lg duration-500" src="/images/beagle_dog.jpg" width="1380" height="826">
                            <div class="absolute inset-0 flex rounded-lg items-center justify-center text-white opacity-0 group-hover:opacity-100 bg-black bg-opacity-50 transition-opacity">
                                <p class="text-lg font-light text-white sm:text-2xl xl:leading-normal">See More</p>
                            </div>
                        </div>
                        <div class="flex items-center justify-between p-4">
                            <h3 class="text-2xl font-normal text-black">Emperor</h3>
                            <span class="h-max rounded-full border border-white/30 px-2 py-1 text-xs tracking-wider text-black">Beagle Dog</span>
                        </div>
                    </a>
                    <a class="rellax rounded-lg group col-span-2 block lg:col-span-1" data-rellax-mobile-speed="0" data-rellax-speed="0" data-rellax-tablet-speed="0" data-rellax-xs-speed="0" href="/showAllProducts">
                        <div class="relative before:absolute before:inset-0 before:origin-top before:bg-gradient-to-t before:from-white/5 before:opacity-50 before:backdrop-grayscale before:transition before:duration-500 group-hover:before:origin-bottom group-hover:before:scale-y-0">
                            <img class="transition rounded-lg duration-500" src="/images/ragdoll_cat.jpg" width="1380" height="1380">
                            <div class="absolute inset-0 flex rounded-lg items-center justify-center text-white opacity-0 group-hover:opacity-100 bg-black bg-opacity-50 transition-opacity">
                                <p class="text-lg font-light text-white sm:text-2xl xl:leading-normal">See More</p>
                            </div>
                        </div>
                        <div class="flex items-center justify-between p-4">
                            <h3 class="text-2xl font-normal text-black">Esper</h3>
                            <span class="h-max rounded-full border border-white/30 px-2 py-1 text-xs tracking-wider text-black">Ragdoll Cat</span>
                        </div>
                    </a>
                </div>
            </div>
        </section>
        <section id="about" class="relative z-20 bg-white md:pb-0 md:pt-0 lg:pb-0 pb-0 select-none">
            <div class="mx-auto max-w-7xl px-6 lg:px-12 xl:px-6 2xl:px-0">
                <div data-rellax-speed="-0.4" data-rellax-xs-speed="0" data-rellax-mobile-speed="0" class="rellax flex flex-wrap items-center gap-6">
                    <h2 class="text-5xl font-bold text-black xl:text-7xl">About us</h2>
                </div>
                <div class="mt-8 md:mt-16">
                    <div class="grid gap-6">
                        <div class="grid md:grid-cols-3 rounded-lg">
                            <div class="overflow-hidden md:col-span-2 rounded-lg">
                                <img src="/images/welcome.jpg" alt="unnamed duo photo" width="1500" height="1000">
                            </div>
                        </div>
                        <div data-rellax-speed="1" data-rellax-xs-speed="0" data-rellax-mobile-speed="0" data-rellax-tablet-speed="0.5" class="rellax ml-auto md:w-3/5 lg:w-2/5 transform md:translate-y-[-50px] lg:translate-y-[-526px]">
                            <p class="mt-12 text-2xl font-light text-black">
                                Discover the perfect furry companion with NeoNest! Our online adoption platform connects you with adorable cats and dogs looking for loving homes. Browse, choose, and adopt—all from the comfort of your home. With detailed pet profiles and support to ensure a smooth adoption process, finding your new best friend has never been easier. Start your journey to a lifetime of love at NeoNest today! 🐾</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/gh/dixonandmoe/rellax@master/rellax.min.js"></script>
</body>

</html>
