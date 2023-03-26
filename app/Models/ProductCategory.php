<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductCategory extends Model
{
    use HasFactory;

    protected $casts = [
        'status' => 'boolean',
        'sort' => 'integer',
    ];

    protected $appends = [
        'product_count'
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status',true);
    }

    public function getProductCountAttribute()
    {
        return $this->products()->count();
    }
}
