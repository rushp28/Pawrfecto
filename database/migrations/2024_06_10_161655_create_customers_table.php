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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->date('date_of_birth');
            $table->string('phone_number', 10)->nullable();
            $table->string('street_address', 256);
            $table->string('city', 128);
            $table->string('state', 128);
            $table->string('postal_code', 10)->nullable();
            $table->boolean('is_account_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
