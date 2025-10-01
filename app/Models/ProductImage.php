<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ProductImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'image_path',
    ];

    public static function booted()
    {
        static::deleting(function (ProductImage $image) {
            if ($image->image_path && Storage::disk('products')->exists($image->image_path)) {
                Storage::disk('products')->delete($image->image_path);
            }
        });
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
