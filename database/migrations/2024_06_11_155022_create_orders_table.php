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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->references('id')->on('customers')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('order_id')->unique();
            $table->string('payment_id')->unique();
            $table->date('order_date');
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
        Schema::dropIfExists('orders');
    }
};
