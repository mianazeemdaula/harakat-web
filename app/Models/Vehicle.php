<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Vehicle extends Model
{
    use HasFactory;

    protected $casts = [
        'user_id' =>'integer',
        'active' =>'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    function rider()  {
        return $this->belongsTo(User::class,'rider_id');
    }

    public function maintenances(): HasMany
    {
        return $this->hasMany(FleetMaintenance::class);
    }
}
