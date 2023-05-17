<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class UserLoyaltyCard extends Model
{
    use HasFactory;

    protected $casts = [
        'loyalty_card_id',
        'user_id',
    ];

    public function card(): BelongsTo
    {
        return $this->belongsTo(LoyaltyCard::class);
    }

    public function getPathAttribute($value)
    {
        return Str::startsWith($value, "http") ? $value : url($value);
    }
}
