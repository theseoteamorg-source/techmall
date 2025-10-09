<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'type',
        'value',
        'min_spend',
        'usage_limit',
        'usage_limit_per_user',
        'expires_at',
    ];

    protected $dates = [
        'expires_at',
    ];
}
