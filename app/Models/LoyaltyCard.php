<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoyaltyCard extends Model
{
    use HasFactory;
    protected $casts = [
        'active' => 'boolean',
    ];
    protected $fillable = ['name', 'name_ar'];
}
