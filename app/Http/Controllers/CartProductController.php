<?php

namespace App\Http\Controllers;

use App\Models\CartProduct;
use App\Http\Requests\StoreCartProductRequest;
use App\Http\Requests\UpdateCartProductRequest;

class CartProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreCartProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CartProduct $cartProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CartProduct $cartProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCartProductRequest $request, CartProduct $cartProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CartProduct $cartProduct)
    {
        //
    }
}
