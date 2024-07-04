<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Products Marketplace</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

<!-- Header Section -->


<nav class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href={{ route('redirect') }} class="flex items-center space-x-3 rtl:space-x-reverse">

        </a>
        <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Get started</button>
            <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
        </div>
        @if (Route::has('login'))
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    @auth
                        <li>
                            <a href="{{ url('/dashboard') }}" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page">Dashboard</a>
                        </li>
                        @if(auth()->user()->hasRole('customer'))
                            <li>
                                <a href="{{ route('products.index') }}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Products</a>
                            </li>
                        @endif
                    @else
                        <li>
                            <a href="{{ route('login') }}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Login</a>
                        </li>
                        @if (Route::has('register'))
                            <li>
                                <a href="{{ route('register') }}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Register</a>
                            </li>
                            <li>
                                <a href="{{ route('vendor-register') }}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Create Vendor Account</a>
                            </li>
                        @endif
                    @endauth
                </ul>
            </div>
        @endif
    </div>
</nav>

<!-- Preloader -->
<div id="preloader" class="preloader">
    <div class="spinner"></div>
</div>

<!-- Hero Section -->
<section id="hero" class="relative h-screen overflow-hidden bg-fixed bg-center bg-cover" style="background-image: url({{ asset('images/hero_image_for_index_page.jpg') }});">
    <div class="absolute inset-0 bg-black opacity-50"></div> <!-- Overlay -->
    <div class="relative z-10 px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
        <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">Highest Quality Care For Pets You'll Love</h1>
        <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">Your One-Stop Shop for All Things Furry and Fabulous! Discover Delightful Delicacies, Cozy Comforts, and Wag-Worthy Wonders Tailored Just for Your Beloved Pets.</p>
        <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
            <a href={{ route('products.index') }} class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-green-400 border-2 border-green-400 hover:bg-transparent focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
            View Products
            <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0  0  14  10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1  5h12m0  0L9  1m4  4L9  9"/>
            </svg>
            </a>
            <a href="#" class="inline-flex justify-center hover:text-gray-900 items-center py-3 px-5 sm:ms-4 text-base font-medium text-center text-white rounded-lg border border-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-400">
                Learn more
            </a>
        </div>
    </div>
</section>

<!-- Products Section -->
<section id="products" class="flex-col py-10">
    <div class="flex justify-center mb-20">
        <h1 class="mb-4 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl"><span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">Only the Best</span> for your Beloved Friends.</h1>
    </div>
    <div class="flex justify-center">
        {{-- @foreach($products as $product) --}}
        {{-- <x-product-card :imageUrl="asset('images/' . $product->image)" :name="$product->name" :price="$product->price" /> --}}
        {{-- @endforeach --}}
    </div>
</section>

<!-- Shop Section -->
<section id="shop" class="relative h-screen overflow-hidden bg-fixed bg-center bg-cover" style="background-image: url({{ asset('images/middle_image_for_index_page.jpg') }});">
    <div class="absolute inset-0 bg-black opacity-50"></div> <!-- Overlay -->
    <div class="relative z-10 px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="flex flex-col items-center space-y-4 bg-white rounded-lg p-6 shadow-md">
                    <div class="flex items-center justify-center w-16 h-16 rounded-full bg-gray-200">
                        <i class="fas fa-dog"></i>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-900">Dogs</h4>
                    <p class="text-gray-600">From comfy beds to stylish accessories, we have everything your dog needs for a paw-some life.</p>
                    <a href="#" class="btn-custom inline-flex items-center justify-center text-gray-900 hover:text-gray-700">
                        <span class="mr-1">Check them out</span>
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
                <div class="flex flex-col items-center space-y-4 bg-white rounded-lg p-6 shadow-md">
                    <div class="flex items-center justify-center w-16 h-16 rounded-full bg-gray-200">
                        <svg class="w-10 h-10 text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 00-1 1v6a1 1 0 102 0V4a1 1 0 00-1-1zm0 10a1 1 0 100-2 1 1 0 000 2zm0 2a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                            <path d="M10 20a1 1 0 100-2 8 8 0 100-16 1 1 0 102 0 6 6 0 110 12zm0-18a1 1 0 100 2 8 8 0 110 16 1 1 0 102 0 6 6 0 100-12z"/>
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-900">Cats</h4>
                    <p class="text-gray-600">Catering to the discerning tastes of cats, our products are sure to satisfy even the most finicky feline.</p>
                    <a href="#" class="btn-custom inline-flex items-center justify-center text-gray-900 hover
">
                        <span class="mr-1">Check them out</span>
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
                <div class="flex flex-col items-center space-y-4 bg-white rounded-lg p-6 shadow-md">
                    <div class="flex items-center justify-center w-16 h-16 rounded-full bg-gray-200">
                        <svg class="w-10 h-10 text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 00-1 1v6a1 1 0 102 0V4a1 1 0 00-1-1zm0 10a1 1 0 100-2 1 1 0 000 2zm0 2a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                            <path d="M10 20a1 1 0 100-2 8 8 0 100-16 1 1 0 102 0 6 6 0 110 12zm0-18a1 1 0 100 2 8 8 0 110 16 1 1 0 102 0 6 6 0 100-12z"/>
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-900">Other Pets</h4>
                    <p class="text-gray-600">Elevate your pet's comfort and happiness with our wide range of products for all types of pets.</p>
                    <a href="#" class="btn-custom inline-flex items-center justify-center text-gray-900 hover:text-gray-700">
                        <span class="mr-1">Check them out</span>
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Footer Section -->
<footer class="bg-gray-800 text-white py-10">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Footer Column 1 -->
            <div>
                <h2 class="text-lg font-semibold mb-4">About Us</h2>
                <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed malesuada faucibus ex nec ultricies. Donec mattis egestas nisi non pretium.</p>
            </div>
            <!-- Footer Column 2 -->
            <div>
                <h2 class="text-lg font-semibold mb-4">Quick Links</h2>
                <ul class="space-y-2">
                    <li><a href="#" class="text-sm">Home</a></li>
                    <li><a href="#" class="text-sm">Products</a></li>
                    <li><a href="#" class="text-sm">About</a></li>
                    <li><a href="#" class="text-sm">Contact</a></li>
                </ul>
            </div>
            <!-- Footer Column 3 -->
            <div>
                <h2 class="text-lg font-semibold mb-4">Contact Info</h2>
                <p class="text-sm">123 Main Street, City</p>
                <p class="text-sm">info@example.com</p>
                <p class="text-sm">123-456-7890</p>
            </div>
            <!-- Footer Column 4 -->
            <div>
                <h2 class="text-lg font-semibold mb-4">Subscribe Newsletter</h2>
                <form>
                    <input type="email" class="w-full px-3 py-2 rounded-lg border-2 border-gray-700 focus:outline-none" placeholder="Enter your email">
                    <button type="submit" class="w-full mt-2 bg-green-400 text-white px-3 py-2 rounded-lg hover:bg-green-500 transition duration-300">Subscribe</button>
                </form>
            </div>
        </div>
    </div>
</footer>
</body>
</html>

<!-- JavaScript -->
@stack('modals')
@livewireScripts


