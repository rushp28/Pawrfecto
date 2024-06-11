<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date_of_birth',
        'phone_number',
        'street_address',
        'city',
        'state',
        'postal_code',
        'is_account_active',
    ];

    protected function casts(): array
    {
        return [
            'user_id' => 'integer',
            'date_of_birth' => 'date',
            'is_account_active' => 'boolean',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
