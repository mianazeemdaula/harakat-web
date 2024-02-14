<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    use HasFactory;

    protected $casts = ['status' => 'boolean'];

    public function shops(): HasMany
    {
        return $this->hasMany(Shop::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
