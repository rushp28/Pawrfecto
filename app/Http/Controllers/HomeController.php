<?php

namespace App\Http\Controllers;

use App\Services\AnalyticsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    protected AnalyticsService $analyticsService;

    public function __construct(AnalyticsService $analyticsService)
    {
        $this->analyticsService = $analyticsService;
    }

    public function redirect()
    {
        $user = auth()->user();

        if ($user->hasRole('super admin')) {

            $totalOrders = $this->analyticsService->totalOrders();
            $totalOrdersAmount = $this->analyticsService->totalOrdersAmount();
            $totalCustomers = $this->analyticsService->totalCustomers();
            $totalVendors = $this->analyticsService->totalVendors();
            $totalProducts = $this->analyticsService->totalProducts();

            return view('dashboard', compact(
                'totalOrders',
                'totalOrdersAmount',
                'totalCustomers',
                'totalVendors',
                'totalProducts',
            ));
        }
//        elseif (Auth::user()->hasRole('admin')) {
//        }
        elseif (Auth::user()->hasRole('vendor')) {
            return view('dashboard');
        }
//        elseif (Auth::user()->hasRole('custom vendor role')) {
//        }
        elseif ($user->hasRole('customer')) {
            return view('index');
        }
        else {
            return view('index');
        }
    }

    public function redirectToVendorRegister()
    {
        return view('vendors.auth.register');
    }
}
