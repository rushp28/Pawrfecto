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
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vendor_id')->unique()->references('id')->on('vendors')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('name', 64);
            $table->string('description', 256)->nullable();
            $table->string('phone_number', 10)->nullable();
            $table->string('street_address', 256);
            $table->string('city', 128);
            $table->string('state', 128);
            $table->string('postal_code', 10)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shops');
    }
};
