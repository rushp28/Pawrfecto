<x-app-layout>
    <body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="container mx-auto p-6">
        <h1 class="text-4xl font-bold mb-6 text-gray-800">Orders for {{ $customer->user->name }}</h1>

        @if($customer->orders->isEmpty())
            <p class="text-gray-700 text-lg">No orders found for this customer.</p>
        @else
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <table class="min-w-full leading-normal">
                    <thead class="bg-gray-200 text-gray-600">
                    <tr>
                        <th class="py-3 px-5 text-left text-sm font-semibold uppercase">Order ID</th>
                        <th class="py-3 px-5 text-left text-sm font-semibold uppercase">Order Date</th>
                        <th class="py-3 px-5 text-left text-sm font-semibold uppercase">Product Count</th>
                        <th class="py-3 px-5 text-left text-sm font-semibold uppercase">Subtotal</th>
                        <th class="py-3 px-5 text-left text-sm font-semibold uppercase">Total Discount</th>
                        <th class="py-3 px-5 text-left text-sm font-semibold uppercase">Total Tax</th>
                        <th class="py-3 px-5 text-left text-sm font-semibold uppercase">Total</th>
                    </tr>
                    </thead>
                    <tbody class="text-gray-700">
                    @foreach($customer->orders as $order)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="py-4 px-5">{{ $order->id }}</td>
                            <td class="py-4 px-5">{{ $order->order_date }}</td>
                            <td class="py-4 px-5">{{ $order->product_count }}</td>
                            <td class="py-4 px-5">{{ $order->sub_total }}</td>
                            <td class="py-4 px-5">{{ $order->total_discount }}</td>
                            <td class="py-4 px-5">{{ $order->total_tax }}</td>
                            <td class="py-4 px-5 font-semibold">{{ $order->total }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
    </body>
</x-app-layout>
