<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                @if(auth()->user()->hasRole('super admin'))
                    <h1 class="text-2xl font-semibold mb-4">Analytics Dashboard</h1>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <!-- Total Orders -->
                        <div
                            class="bg-green-500 text-white p-6 rounded-lg shadow-md hover:scale-105 transition duration-300 ease-in-out transform hover:shadow-lg">
                            <h2 class="text-lg font-semibold mb-2">Total Orders</h2>
                            <div class="text-xl">{{ isset($totalOrders) ? $totalOrders : 0 }}</div>
                        </div>

                        <!-- Total Sales -->
                        <div
                            class="bg-gray-900 text-white p-6 rounded-lg shadow-md hover:scale-105 transition duration-300 ease-in-out transform hover:shadow-lg">
                            <h2 class="text-lg font-semibold mb-2">Total Sales</h2>
                            <div class="text-xl">LKR {{ isset($totalOrdersAmount) ? $totalOrdersAmount : 0 }}</div>
                        </div>

                        <!-- Total Customers -->
                        <div
                            class="bg-green-500 text-white p-6 rounded-lg shadow-md hover:scale-105 transition duration-300 ease-in-out transform hover:shadow-lg">
                            <h2 class="text-lg font-semibold mb-2">Total Customers</h2>
                            <div class="text-xl">{{ $totalCustomers }}</div>
                        </div>

                        <!-- Total Products -->
                        <div
                            class="bg-gray-900 text-white p-6 rounded-lg shadow-md hover:scale-105 transition duration-300 ease-in-out transform hover:shadow-lg">
                            <h2 class="text-lg font-semibold mb-2">Total Products</h2>
                            <div class="text-xl">{{ $totalProducts }}</div>
                        </div>

                        <!-- Total Revenue -->
                        <div
                            class="bg-green-500 text-white p-6 rounded-lg shadow-md hover:scale-105 transition duration-300 ease-in-out transform hover:shadow-lg">
                            <h2 class="text-lg font-semibold mb-2">Total Revenue</h2>
                            <div class="text-xl">LKR {{ isset($totalOrdersAmount) ? $totalOrdersAmount *0.1 : 0 }}</div>
                        </div>

                        <!-- Total Vendors -->
                        <div
                            class="bg-gray-900 text-white p-6 rounded-lg shadow-md hover:scale-105 transition duration-300 ease-in-out transform hover:shadow-lg">
                            <h2 class="text-lg font-semibold mb-2">Total Vendors</h2>
                            <div class="text-xl">{{ $totalVendors }}</div>
                        </div>
                        @endif

                        <!-- Total Customer Orders (if logged in user is customer) -->
                        @if(auth()->user()->hasRole('customer'))
                            <div
                                class="bg-gray-900 text-white p-6 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:shadow-lg">
                                <h2 class="text-lg text-white font-semibold mb-2">Your Total Orders</h2>
                                <div class="text-xl text-white">{{ $totalCustomerOrders }}</div>
                            </div>
                        @endif
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>
