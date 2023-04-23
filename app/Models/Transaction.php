<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Traits\BalanceTrait;

class Transaction extends Model
{
    use HasFactory, BalanceTrait;

    protected $fillable = [
        'user_id',
        'type',
        'details',
        'amount',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
