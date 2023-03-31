<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderAddon extends Model
{
    use HasFactory;

    protected $with = ['addon'];

    protected $casts = [
        'order_id' => 'integer',
        'addon_id' => 'integer',
        'qty' => 'integer',
        'price' => 'double',
    ];

    public function addon(): BelongsTo
    {
        return $this->belongsTo(Addon::class);
    }
}
