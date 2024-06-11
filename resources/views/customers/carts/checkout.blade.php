<x-app-layout>
    <div class="container mx-auto">
        <div class="my-8">
            <!-- Checkout form -->
            <form action="{{ route('checkout.process') }}" method="POST">
                @csrf

                <!-- Shipping and payment details inputs -->
                <!-- Add inputs for shipping address, payment method, etc. -->

                <!-- Cart details -->
                <h2 class="text-lg font-semibold">Cart Summary</h2>
                <ul>
                    @foreach($cart->products as $product)
                        <li>{{ $product->name }} - ${{ $product->pivot->price }} x {{ $product->pivot->quantity }}</li>
                    @endforeach
                </ul>

                <!-- Total -->
                <div class="mt-4">
                    <strong>Total: ${{ $cart->total }}</strong>
                </div>

                <!-- Checkout button -->
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">Checkout</button>
            </form>
        </div>
    </div>
</x-app-layout>
