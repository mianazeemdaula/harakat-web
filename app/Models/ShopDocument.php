<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ShopDocument extends Model
{
    use HasFactory;

    public function getDocAttribute($value)
    {
        return Str::startsWith($value, "http") ? $value : url($value);
    }
}
