<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\AnalyticsService;
use ConsoleTVs\Charts\Facades\Charts;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    protected AnalyticsService $analyticsService;

    public function __construct(AnalyticsService $analyticsService)
    {
        $this->analyticsService = $analyticsService;
    }

    public function index(Request $request)
    {
        $totalOrders = $this->analyticsService->totalOrders();
        $totalOrdersAmount = $this->analyticsService->totalOrdersAmount();
        $totalCustomers = $this->analyticsService->totalCustomers();
        $totalVendors = $this->analyticsService->totalVendors();
        $totalProducts = $this->analyticsService->totalProducts();
        $totalCustomerOrders = $this->analyticsService->totalCustomerOrders();

        // Fetch other analytics data similarly

        return view('dashboard', compact(
            'totalOrders',
            'totalOrdersAmount',
            'totalCustomers',
            'totalVendors',
            'totalProducts',
            'totalCustomerOrders',
        ));
    }
}
