{{-- Customer Checkout Page --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Checkout') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-6 bg-white shadow-md rounded-lg mt-6">
        <div class="my-8">
            <!-- Customer Details -->
            <div class="mb-6">
                <h2 class="text-2xl font-semibold text-gray-800">Customer Information</h2>
                <div class="mt-4">
                    <p><strong>Name:</strong> {{ $customer->user->name }}</p>
                    <p><strong>Email:</strong> {{ $customer->user->email }}</p>
                    <p><strong>Phone:</strong> {{ $customer->phone_number }}</p>
                    <p><strong>Address:</strong> {{ $customer->street_address }}, {{ $customer->city }}, {{ $customer->state }}, {{ $customer->postal_code }}</p>
                </div>
            </div>

            <!-- Checkout form -->
            <form action="{{ route('payment') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Shipping Details -->
                <div class="bg-gray-100 p-4 rounded-lg">
                    <h2 class="text-lg font-semibold">Shipping Details</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
                        <div>
                            <label for="street_address" class="block text-sm font-medium text-gray-700">Street Address</label>
                            <input type="text" name="street_address" id="street_address" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm" value="{{ $customer->street_address }}" required>
                        </div>
                        <div>
                            <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                            <input type="text" name="city" id="city" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm" value="{{ $customer->city }}" required>
                        </div>
                        <div>
                            <label for="state" class="block text-sm font-medium text-gray-700">State</label>
                            <input type="text" name="state" id="state" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm" value="{{ $customer->state }}" required>
                        </div>
                        <div>
                            <label for="postal_code" class="block text-sm font-medium text-gray-700">Postal Code</label>
                            <input type="text" name="postal_code" id="postal_code" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm" value="{{ $customer->postal_code }}" required>
                        </div>
                    </div>
                </div>

                <!-- Cart details -->
                <div class="bg-gray-100 p-4 rounded-lg">
                    <h2 class="text-lg font-semibold">Cart Summary</h2>
                    <ul class="mt-4 space-y-2">
                        @foreach($cart->products as $product)
                            <li class="flex justify-between">
                                <span>{{ $product->name }} - ${{ number_format($product->pivot->price, 2) }} x {{ $product->pivot->quantity }}</span>
                                <span>${{ number_format($product->pivot->price * $product->pivot->quantity, 2) }}</span>
                            </li>
                        @endforeach
                    </ul>

                    <!-- Total -->
                    <div class="mt-4 text-right">
                        <strong class="text-xl">Total: ${{ number_format($cart->total, 2) }}</strong>
                    </div>
                </div>

                <input name="cart_total" id="cart_total" type="hidden" value="{{ $cart->total }}">

                <!-- Checkout button -->
                <div class="text-right">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">Checkout</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
