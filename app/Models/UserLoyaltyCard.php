<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLoyaltyCard extends Model
{
    use HasFactory;

    protected $casts = [
        'loyalty_card_id',
        'user_id',
    ];
}
