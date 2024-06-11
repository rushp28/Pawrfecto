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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->unique()->references('id')->on('customers')->cascadeOnDelete()->cascadeOnUpdate();
            $table->smallInteger('product_count')->default(0);
            $table->float('sub_total', 10)->default(0);
            $table->float('total_discount', 10)->default(0);
            $table->float('total_tax', 10)->default(0);
            $table->float('total', 10)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
