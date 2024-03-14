<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <!-- Users Index Section -->
                <div class="my-6">
                    <h3 class="text-lg font-semibold mb-2">Manage Users</h3>
                    <p class="text-gray-600">Click below to manage users:</p>
                    <a href="{{ route('users.index') }}" class="text-blue-500 hover:text-blue-700">Go to Users Index</a>
                </div>

                <!-- Product Categories Index Section -->
                <div class="my-6">
                    <h3 class="text-lg font-semibold mb-2">Manage Product Categories</h3>
                    <p class="text-gray-600">Click below to manage product categories:</p>
                    <a href="{{ route('product-categories.index') }}" class="text-blue-500 hover:text-blue-700">Go to Product Categories Index</a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
