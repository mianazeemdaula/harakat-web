<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Addon extends Model
{
    use HasFactory;

    protected $casts = [
        'available'=> 'boolean',
        'user_id' => 'integer',
        'price' => 'double',
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'addon_products');
    }
}
