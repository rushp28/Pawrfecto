<x-app-layout>
    <!-- Page Header -->
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <!-- Success Message -->
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4 mb-5" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <title>Close</title>
                        <path d="M14.348 5.652a.5.5 0 010 .707L9.707 10l4.641 4.641a.5.5 0 11-.707.707L9 10.707l-4.641 4.641a.5.5 0 11-.707-.707L8.293 10 3.652 5.359a.5.5 0 01.707-.707L9 9.293l4.641-4.641a.5.5 0 01.707 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                    </svg>
                </span>
            </div>
        @endif

        <!-- Create Product Button and Search -->
        <div class="sm:flex sm:items-center justify-between mb-4">
            <a href="{{ route('products.create') }}" class="inline-flex items-center px-4 py-2 bg-green-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-400 hover:scale-105 focus:bg-green-400 active:bg-green-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                {{ __('Create Product') }}
            </a>
            <div class="relative">
                <label for="table-search" class="sr-only">Search</label>
                <input type="text" id="table-search-products" class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Search for products">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Product Table -->
        <div class="relative overflow-x-auto sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr class="bg-gray-800 text-white">
                    <th scope="col" class="px-4 py-3"><span class="sr-only">Image</span></th>
                    <th scope="col" class="px-6 py-3">Product</th>
                    <th scope="col" class="px-6 py-3">Category</th>
                    <th scope="col" class="px-6 py-3">Qty</th>
                    <th scope="col" class="px-6 py-3">Price</th>
                    <th scope="col" class="px-6 py-3">Discounted Price</th>
                    <th scope="col" class="px-6 py-3">Actions</th>
                </tr>
                </thead>
                <tbody>
                <!-- Loop through products -->
                @if(isset($products))
                    @foreach($products as $product)
                        <tr class="bg-white border-b">
                            <td class="px-4 py-4">
                                <img src="{{ asset('images/hero_image_for_index_page.jpg') }}" class="w-20 md:w-48 max-w-full max-h-full" alt="{{ $product->name }}">
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900">{{ $product->name }}</td>
                            <td class="px-6 py-4 font-semibold text-gray-900">{{ $product->productCategory->name }}</td>
                            <td class="px-6 py-4 font-semibold text-gray-900">{{ $product->quantity }}</td>
                            <td class="px-6 py-4 font-semibold text-gray-900">LKR {{ number_format($product->price, 2) }}</td>
                            <td class="px-6 py-4 font-semibold text-gray-900">LKR {{ number_format($product->discounted_price, 2) }}</td>
                            <td class="px-6 py-4 flex items-center justify-center space-x-2">
                                <a href="{{ route('products.edit', $product->id) }}" class="py-8 text-blue-600 font-bold hover:underline">Edit</a>
                                <form method="POST" action="{{ route('products.destroy', $product->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="py-8 text-red-600 font-bold hover:underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7" class="px-6 py-4 text-center text-gray-500">No products found</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
