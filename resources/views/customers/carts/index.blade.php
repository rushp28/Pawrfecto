<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your Cart') }}
        </h2>
    </x-slot>

    <div class="overflow-x-auto shadow-md sm:rounded-lg bg-white dark:bg-gray-800 p-6">
        <table class="w-full text-sm text-left rtl:text-right text-gray-800 dark:text-gray-200">
            <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-4 py-3">
                    <span class="sr-only">Image</span>
                </th>
                <th scope="col" class="px-4 py-3">
                    Product
                </th>
                <th scope="col" class="px-4 py-3">
                    Qty
                </th>
                <th scope="col" class="px-4 py-3">
                    Price
                </th>
                <th scope="col" class="px-4 py-3">
                    Action
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach ($cart->products as $product)
                <tr class="border-b dark:border-gray-700">
                    <td class="p-4">
                        <img src="/docs/images/products/{{ $product->image }}" class="w-16 md:w-32 max-w-full max-h-full rounded-md" alt="{{ $product->name }}">
                    </td>
                    <td class="px-4 py-4 font-semibold">
                        {{ $product->name }}
                    </td>
                    <td class="px-4 py-4">
                        <div class="flex items-center">
                            <input type="number" id="quantity_{{ $product->id }}" class="bg-gray-100 dark:bg-gray-600 w-16 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1" placeholder="1" value="{{ $product->pivot->quantity }}" required />
                        </div>
                    </td>
                    <td class="px-4 py-4 font-semibold">
                        ${{ $product->price }}
                    </td>
                    <td class="px-4 py-4">
                        <div class="flex space-x-2">
                            <form action="{{ route('carts.add', $product->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="text-green-600 dark:text-green-400 hover:underline">Add</button>
                            </form>
                            <form action="{{ route('carts.remove', $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 dark:text-red-400 hover:underline">Remove</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="mt-6">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Cart Totals</h3>
            <ul class="text-gray-800 dark:text-gray-300 mt-4">
                <li class="my-2 text-xl">
                    Subtotal: ${{ $cart->sub_total }}
                </li>
                <li class="my-2 text-xl">
                    Total Discount: ${{ $cart->total_discount }}
                </li>
                <li class="my-2 text-xl">
                    Total Tax: ${{ $cart->total_tax }}
                </li>
                <li class="my-2 text-2xl">
                    <hr class="my-2 border-gray-300 dark:border-gray-600" />
                    <span class="font-semibold">Total: ${{ $cart->total }}</span>
                </li>
            </ul>
            <div class="mt-8 flex justify-end">
                <form action="{{ route('checkout') }}" method="GET">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline">Checkout</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
