<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'logo',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'include_in_sitemap',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
