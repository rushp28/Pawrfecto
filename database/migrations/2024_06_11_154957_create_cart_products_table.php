<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cart_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cart_id')->references('id')->on('carts')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('product_id')->references('id')->on('products')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('quantity')->default(1);
            $table->float('price', 10)->default(0);
            $table->float('discount', 10)->default(0);
            $table->float('tax', 10)->default(0);
            $table->unique(['cart_id', 'product_id']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_products');
    }
};
