<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use MatanYadaev\EloquentSpatial\Objects\Point;
use MatanYadaev\EloquentSpatial\Traits\HasSpatial;
use MatanYadaev\EloquentSpatial\SpatialBuilder;


class Merchant extends Model
{
    use HasFactory;

    protected $casts = [
        'location' => Point::class,
    ];

    public static function query(): SpatialBuilder
    {
        return parent::query();
    }
}
