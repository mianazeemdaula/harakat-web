<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use MatanYadaev\EloquentSpatial\Objects\Point;
use MatanYadaev\EloquentSpatial\Traits\HasSpatial;
use MatanYadaev\EloquentSpatial\SpatialBuilder;

class Rider extends Model
{
    use HasFactory;

    protected $fillable = [
        'live',
        'live_geo',
        'user_id',
        'location'
    ];

    protected $casts = [
        'user_id' => 'integer',
        'category_id' => 'integer',
        'city_id' => 'integer',
        'location' => Point::class,
        'live_geo' => Point::class,
        'live' => 'boolean',
    ];

    public function newEloquentBuilder($query): SpatialBuilder
    {
        return new SpatialBuilder($query);
    }

    public static function query(): SpatialBuilder
    {
        return parent::query();
    }

}
