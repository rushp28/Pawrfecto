<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_product_category_id',
        'name',
        'description',
        'is_active',
    ];

    protected $casts = [
        'parent_product_category_id' => 'integer',
        'is_active' => 'boolean',
    ];

    public function parentCategory(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'parent_product_category_id');
    }

    public function childCategories(): HasMany
    {
        return $this->hasMany(ProductCategory::class, 'parent_product_category_id');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
