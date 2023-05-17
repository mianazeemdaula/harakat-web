<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inbox extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
    ];

    protected $casts = [
        'user_id' => 'integer',
        'star' => 'boolean',
        'read' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,);
    }

    public function user2(): BelongsTo
    {
        return $this->belongsTo(User::class,'user2_id');
    }
}

