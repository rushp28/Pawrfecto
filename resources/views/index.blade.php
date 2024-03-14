<x-app-layout>

    {{-- Hero Section --}}
    <section class="relative h-screen overflow-hidden bg-fixed bg-center bg-cover" style="background-image: url({{ asset('images/bg_1.jpg') }});">
        <div class="absolute inset-0 bg-black opacity-50"></div> <!-- Overlay -->
        <div class="relative z-10 px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">Highest Quality Care For Pets You'll Love</h1>
            <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">Your One-Stop Shop for All Things Furry and Fabulous! Discover Delightful Delicacies, Cozy Comforts, and Wag-Worthy Wonders Tailored Just for Your Beloved Pets.</p>
            <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">z
                <a href="#" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-green-400 border-2 border-green-400 hover:bg-transparent focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
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

    <section class="flex-col py-10">
        <div class="flex justify-center mb-20">
            <h1 class="mb-4 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl"><span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">Only the Best</span> for your Beloved Friends.</h1>
        </div>

        <div class="flex justify-center">
            <x-product-card :imageUrl="asset('images/product_1.jpg')" :name="'Your Product Name'" :price="599" />
            <x-product-card :imageUrl="asset('images/product_2.jpg')" :name="'Your Product Name'" :price="599" />
            <x-product-card :imageUrl="asset('images/product_3.jpeg')" :name="'Your Product Name'" :price="599" />
            <x-product-card :imageUrl="asset('images/product_4.jpeg')" :name="'Your Product Name'" :price="599" />
        </div>
    </section>

    <section class="relative h-screen overflow-hidden bg-fixed bg-center bg-cover" style="background-image: url({{ asset('images/image_4.jpg') }});">
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
                    <span class="mr-1">
                        Check them out
                    </span>
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
                        <a href="#" class="btn-custom inline-flex items-center justify-center text-gray-900 hover:text-gray-700">
                            <span class="mr-1">
                                Check them out
                            </span>
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
                            <span class="mr-1">
                                Check them out
                            </span>
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="flex-col py-10">
        <div class="flex justify-center mb-20">
            <h1 class="mb-4 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl"><span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">Discover Premier Pet Boutiques</span>  Featuring the Finest Selections.</h1>
        </div>

        <div class="flex justify-center">
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg" src="{{ asset('images/bg_1.jpg') }}" alt="" />
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Paws & Claws Emporium</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Your one-stop destination for all your furry friends' needs! From premium pet food to stylish accessories, we've got everything to keep your pets happy and healthy.</p>
                    <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-400 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-green-400 dark:focus:ring-blue-800">
                        Check them out
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </div>

            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg" src="{{ asset('images/bg_1.jpg') }}" alt="" />
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Happy Tails Pet Haven</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Welcome to Happy Tails Pet Haven, where tails wag and pets play! Discover a wide selection of toys, treats, and grooming essentials for your beloved companions.</p>
                    <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-400 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-green-400 dark:focus:ring-blue-800">
                        Check them out
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </div>

            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg" src="{{ asset('images/bg_1.jpg') }}" alt="" />
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Happy Tails Pet Haven</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Welcome to Happy Tails Pet Haven, where tails wag and pets play! Discover a wide selection of toys, treats, and grooming essentials for your beloved companions.</p>
                    <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-400 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-green-400 dark:focus:ring-blue-800">
                        Check them out
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

    </section>

    <x-footer/>

</x-app-layout>
