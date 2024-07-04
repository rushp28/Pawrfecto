<?php

namespace App\Services;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Models\Vendor;

class AnalyticsService
{
    public function totalOrders(): int
    {
        return Order::count();
    }

    public function totalOrdersAmount()
    {
        return Order::sum('total');
    }

    public function totalCustomers(): int
    {
        return Customer::count();
    }

    public function totalVendors(): int
    {
        return Vendor::count();
    }

    public function totalProducts(): int
    {
        return Product::count();
    }

    public function totalCustomerOrders(): int
    {

        $user = auth()->user();
        if ($user->hasRole('customer'))
        {
            return Order::where('customer_id', $user->customer->id)->count();
        }
        else
        {
            return 0;
        }
    }
}
