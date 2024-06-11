<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        if ($user->hasRole('super admin')) {
            return view('super-admins.products.index',[
                'products' => Product::all(),
            ]);
        }
        elseif (Auth::user()->hasRole('vendor')) {
            return view('vendors.products.index', [
                'products' => Product::where('shop_id', auth()->user()->vendor->shop->id)->get(),
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();

        if ($user->hasRole('super admin')) {
            return view('super-admins.products.index',[
                'products' => Product::all(),
            ]);
        }
        elseif (Auth::user()->hasRole('vendor')) {
            return view('vendors.products.create-edit', [
                'action' => 'create',
                'product_categories' => ProductCategory::all(),
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $shopId = auth()->user()->vendor->shop->id;
        $request->merge(['shop_id' => $shopId]);

        (new Product())->create($request->all());

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('vendors.products.create-edit', [
            'action' => 'edit',
            'product' => $product,
            'product_categories' => ProductCategory::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->validated());

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
