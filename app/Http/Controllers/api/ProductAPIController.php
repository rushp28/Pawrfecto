<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductAPIController extends Controller
{
    public function index()
    {
        return response()->json(Product::all());
    }
}
