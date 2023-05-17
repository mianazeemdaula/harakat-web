<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopLoyaltyCardDiscount extends Model
{
    use HasFactory;

    protected $fillable = ['loyalty_card_id', 'user_id','discount_percent','status' ];

    protected $casts = [
        'discount_percent' => 'double',
        'user_id' => 'integer',
        'loyalty_card_id' => 'integer',
    ];
}
