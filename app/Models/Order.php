<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use MatanYadaev\EloquentSpatial\Objects\Point;
use MatanYadaev\EloquentSpatial\Traits\HasSpatial;
use MatanYadaev\EloquentSpatial\SpatialBuilder;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Order extends Model
{
    use HasFactory;

    protected $casts = [
        'drop_location' => Point::class,
        'user_id' =>  'integer',
        'shop_id' =>  'integer',
        'delivery_amount' =>  'double',
        'gross_amount' =>  'double',
        'total_amount' =>  'double',
        'discount_amount' =>  'double',
        'vat' =>  'double',
        'payment_card' =>  'integer',
        'offer_id' =>  'integer',
    ];

    public function newEloquentBuilder($query): SpatialBuilder
    {
        return new SpatialBuilder($query);
    }

    public function details(): HasMany
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function addons(): HasMany
    {
        return $this->hasMany(OrderAddon::class);
    }


    public function payments(): HasMany
    {
        return $this->hasMany(OrderPayment::class);
    }

    public function payment(): HasOne
    {
        return $this->hasOne(OrderPayment::class)->latest();
    }

    public function shop(): BelongsTo
    {
        return $this->belongsTo(User::class, 'shop_id');
    }

    public function rider(): BelongsTo
    {
        return $this->belongsTo(User::class, 'rider_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    public function scopWithData($query)
    {
        return $query->with(['payment', 'details','user', 'shop']);
    }
}
