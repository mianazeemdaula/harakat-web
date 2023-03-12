<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use MatanYadaev\EloquentSpatial\Objects\Point;
use MatanYadaev\EloquentSpatial\Traits\HasSpatial;
use MatanYadaev\EloquentSpatial\SpatialBuilder;

use Illuminate\Database\Eloquent\Relations\BelongsTo;



class Shop extends Model
{
    use HasFactory;

    protected $casts = [
        'location' => Point::class,
        'user_id' => 'integer',
    ];

    public function newEloquentBuilder($query): SpatialBuilder
    {
        return new SpatialBuilder($query);
    }

    public static function query(): SpatialBuilder
    {
        return parent::query();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Shop::class,'parent_id');
    }

    private function findNearestRestaurants($latitude, $longitude, $radius = 400)
    {
        /*
         * using eloquent approach, make sure to replace the "Restaurant" with your actual model name
         * replace 6371000 with 6371 for kilometer and 3956 for miles
         */
        $restaurants = Shop::selectRaw("id, name, address, latitude, longitude, rating, zone ,
                         ( 6371000 * acos( cos( radians(?) ) *
                           cos( radians( latitude ) )
                           * cos( radians( longitude ) - radians(?)
                           ) + sin( radians(?) ) *
                           sin( radians( latitude ) ) )
                         ) AS distance", [$latitude, $longitude, $latitude])
            ->where('active', '=', 1)
            ->having("distance", "<", $radius)
            ->orderBy("distance",'asc')
            ->offset(0)
            ->limit(20)
            ->get();

        return $restaurants;
    }

    static public function withinGeoRadius(Point $position, int $distanceInKilometers = 0): self
    {
        //delivery_radius
        $statement = sprintf(
            "ST_DWithin(ST_GeographyFromText('SRID=%s;%s')::geography, location, %d)",
            '4326',
            $position->toWKT(),
            $distanceInKilometers * 1000
        );

        return whereRaw($statement);
    }
}
