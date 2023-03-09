<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    protected $casts = ['status' => 'boolean'];

    public function merchants(): HasMany
    {
        return $this->hasMany(Merchant::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status',true);
    }
}
