<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'product_count',
        'sub_total',
        'total_discount',
        'total_tax',
        'total',
        ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function cartProducts(): HasMany
    {
        return $this->hasMany(CartProduct::class);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'cart_products')
            ->withPivot('quantity', 'price', 'discount', 'tax')
            ->withTimestamps();
    }
}
