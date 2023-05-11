<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'name_ar', 'price', 'description', 'description_ar', 'promo'];
    
    protected $appends = ['rating','rating_count'];
    protected $casts = [
        'user_id' => 'integer',
        'product_category_id' => 'integer',
        'price' => 'double',
        'promo_price' => 'double',
        'vat' => 'double',
        'prepration_time' => 'integer',
        'rating' => 'double',
        'status' => 'boolean',
        'promo' => 'boolean',
        'available' => 'boolean',
    ];

    public function getImageAttribute($value)
    {
        return Str::startsWith($value, "http") ? $value : ( $value == null ? "https://ui-avatars.com/api/?name=Axy+Boe" : url($value));
    }

    public function shop(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    public function reviews(): MorphMany
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

    
    public function addons(): BelongsToMany
    {
        return $this->belongsToMany(Addon::class, 'addon_products');
    }

    public function getRatingAttribute()
    {
        return $this->reviews()->avg('rating') ?? 0;
    }

    public function getRatingCountAttribute()
    {
        return $this->reviews()->count();
    }
}
