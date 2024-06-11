<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart = auth()->user()->customer->carts->first()->with('products')->first();

        return view('customers.carts.index', compact('cart'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCartRequest $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCartRequest $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }

    public function addToCart(Request $request, $productId) {
        $product = Product::findOrFail($productId);
        $customer = auth()->user()->customer;

        if (!$customer->carts->isEmpty()) {
            // If the customer has existing carts, use the first one
            $cart = $customer->carts->first();
        }
        else {
            // If the customer doesn't have any carts, create a new one
            $cart = new Cart();
            $customer->carts()->save($cart);
        }

        // Check if the product is already in the cart
        if ($cart->products()->where('product_id', $product->id)->exists()) {
            // If so, increment the quantity
            $existingProduct = $cart->products()->where('product_id', $product->id)->first();
            $existingProduct->pivot->quantity += 1;
            $existingProduct->pivot->save();
        } else {
            // Otherwise, add the product to the cart with quantity 1
            $cart->products()->attach($product->id, [
                'quantity' => 1,
                'price' => $product->price,
                'discount' => $product->discounted_price,
                'tax' => 0 // You might want to adjust this based on your tax logic
            ]);
        }

        $cart->product_count = $cart->products()->sum('cart_products.quantity');
        $cart->sub_total = $cart->products->sum(function($product) {
            return $product->pivot->price * $product->pivot->quantity;
        });
        $cart->total_discount = $cart->products->sum(function($product) {
            return $product->pivot->discount * $product->pivot->quantity;
        });
        $cart->total_tax = $cart->products->sum(function($product) {
            return $product->pivot->tax * $product->pivot->quantity;
        });

        $cart->total = $cart->sub_total - $cart->total_discount + $cart->total_tax;
        $cart->save();
        $cart->save();

        return redirect()->back()->with('success', 'Product added to cart successfully.');
    }

    public function removeFromCart(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);
        $customer = auth()->user()->customer;

        // Check if the customer has a cart
        if (!$customer->carts->isEmpty()) {
            $cart = $customer->carts->first();

            // Check if the product exists in the cart
            if ($cart->products()->where('product_id', $product->id)->exists()) {
                $existingProduct = $cart->products()->where('product_id', $product->id)->first();

                // Decrement the quantity of the product in the cart
                if ($existingProduct->pivot->quantity > 1) {
                    $existingProduct->pivot->quantity -= 1;
                    $existingProduct->pivot->save();
                } else {
                    // If quantity is 1, remove the product from the cart
                    $cart->products()->detach($product->id);
                }

                // Update cart totals
                $cart->product_count = $cart->products()->sum('cart_products.quantity');
                $cart->sub_total = $cart->products->sum(function ($product) {
                    return $product->pivot->price * $product->pivot->quantity;
                });
                $cart->total_discount = $cart->products->sum(function ($product) {
                    return $product->pivot->discount * $product->pivot->quantity;
                });
                $cart->total_tax = $cart->products->sum(function ($product) {
                    return $product->pivot->tax * $product->pivot->quantity;
                });
                $cart->total = $cart->sub_total - $cart->total_discount + $cart->total_tax;
                $cart->save();

                return redirect()->back()->with('success', 'Product removed from cart successfully.');
            }
        }

        return redirect()->back()->with('error', 'Product not found in cart.');
    }

    public function checkout()
    {
        $cart = auth()->user()->customer->carts->with('products')->first();

        return view('customers.carts.checkout', compact('cart'));
    }
}
