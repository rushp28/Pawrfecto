<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'shop_id' => 1,
            'product_category_id' => 1,
            'name' => 'Dog Food',
            'description' => 'A delicious and nutritious dog food',
            'price' => 1000,
            'quantity' => 100,
            'discounted_price' => 0,
        ]);

        Product::create([
            'shop_id' => 1,
            'product_category_id' => 1,
            'name' => 'Cat Food',
            'description' => 'A delicious and nutritious cat food',
            'price' => 500,
            'quantity' => 100,
            'discounted_price' => 0,
        ]);

        Product::create([
            'shop_id' => 1,
            'product_category_id' => 1,
            'name' => 'Bird Food',
            'description' => 'A delicious and nutritious bird food',
            'price' => 200,
            'quantity' => 100,
            'discounted_price' => 0,
        ]);
    }
}
