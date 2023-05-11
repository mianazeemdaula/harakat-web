<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    protected $casts = ['status' => 'boolean'];

    public function getImageAttribute($value)
    {
        return Str::startsWith($value, "http") ? $value : ( $value == null ? "https://ui-avatars.com/api/?name=Axy+Boe" : url($value));
    }

    public function shops(): HasMany
    {
        return $this->hasMany(Shop::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status',true);
    }
}
