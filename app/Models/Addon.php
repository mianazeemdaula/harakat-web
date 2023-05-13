<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Addon extends Model
{
    use HasFactory;

    protected $casts = [
        'available'=> 'boolean',
        'addon_category_id' => 'integer',
        'price' => 'double',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(AddonCategory::class,'addon_category_id');
    }
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'addon_products');
    }
}
