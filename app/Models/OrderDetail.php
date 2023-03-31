<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderDetail extends Model
{
    use HasFactory;

    protected $casts = [
        'order_id' => 'integer',
        'product_id' => 'integer',
        'qty' => 'integer',
        'price' => 'double',
        'delivery_charges' => 'double',
    ];

    protected $with = ['product'];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
