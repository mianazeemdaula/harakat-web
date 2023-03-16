<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use MatanYadaev\EloquentSpatial\Objects\Point;
use MatanYadaev\EloquentSpatial\Traits\HasSpatial;
use MatanYadaev\EloquentSpatial\SpatialBuilder;

class Address extends Model
{
    use HasFactory;
    protected $casts = [
        'location' => Point::class,
        'user_id' => 'integer',
        'status' => 'boolean',
    ];
}
