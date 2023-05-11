<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;


use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Permission\Traits\HasRoles;
use App\Traits\BalanceTrait;

use Illuminate\Database\Eloquent\Relations\MorphMany;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes, BalanceTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $with = ['rider', 'shop.category', 'customer'];
    protected $appends = ['rating','rating_count'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'rating' => 'float',
        'rating_count' => 'integer',
        'image' => 'string',
    ];


    public function getImageAttribute($value)
    {
        return Str::startsWith($value, "http") ? $value : ( $value == null ? "https://ui-avatars.com/api/?name=Axy+Boe" : url($value));
    }

    public function shop(): HasOne
    {
        return $this->hasOne(Shop::class);
    }

    public function customer(): HasOne
    {
        return $this->hasOne(Customer::class);
    }

    public function rider(): HasOne
    {
        return $this->hasOne(Rider::class);
    }
    
    public function balance(): HasOne
    {
        return $this->hasOne(Balance::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function loyaltyCards(): HasMany
    {
        return $this->hasMany(UserLoyaltyCard::class);
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function cards(): HasMany
    {
        return $this->hasMany(PaymentCard::class);
    }

    public function timeSlots(): HasMany
    {
        return $this->hasMany(TimeSlot::class);
    }
    
    public function reviews(): MorphMany
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

    public function recentProducts()
    {
        return $this->belongsToMany(Product::class,'recent_products')->withTimestamps();
    }

    public function awards(): HasMany
    {
        return $this->hasMany(ShopDocument::class,'shop_id')->where('type','award');
    }

    public function licences(): HasMany
    {
        return $this->hasMany(ShopDocument::class,'shop_id')->where('type','licence');
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
