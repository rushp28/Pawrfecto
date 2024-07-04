<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_id',
        'product_category_id',
        'name',
        'description',
        'price',
        'discounted_price',
        'quantity',
        'is_active',
        'image',
    ];

    protected $casts = [
        'shop_id' => 'integer',
        'product_category_id' => 'integer',
        'price' => 'float:2',
        'discounted_price' => 'float:2',
        'quantity' => 'integer',
        'is_active' => 'boolean',
    ];

    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class);
    }

    public function productCategory(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function cartProducts(): HasMany
    {
        return $this->hasMany(CartProduct::class);
    }
}
