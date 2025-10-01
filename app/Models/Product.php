<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'details',
        'price',
        'category_id',
        'brand_id',
        'image',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    protected $appends = [
        'image_url',
    ];

    public static function booted()
    {
        static::deleting(function (Product $product) {
            $product->variants()->delete();
            $product->images()->each(function (ProductImage $image) {
                Storage::disk('products')->delete($image->image_path);
                $image->delete();
            });
            if ($product->image && Storage::disk('products')->exists($product->image)) {
                Storage::disk('products')->delete($product->image);
            }
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => Storage::disk('products')->url($this->image),
        );
    }
}
