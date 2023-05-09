<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopLoyaltyCardDicount extends Model
{
    use HasFactory;

    protected $casts = [
        'discount_percent' => 'double',
        'user_id' => 'integer',
        'loyalty_card_id' => 'integer',
    ];
}
