<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Product extends Model
{
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    protected $fillable = [
        'name',
        'price',
        'price_opt',
        'slug',
        'category_id',
        'country_id',
        'description',
        'image_path'
    ];
    protected static function boot(): void
    {
        parent::boot();

        // Auto-generate slug when creating a new product
        static::creating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->name);
            }
        });
    }
    public function finalPrice() {
        if(Auth::check() && Auth::user()->type == 1) {
            return $this->price_opt;
        } else {
            return $this->price;
        }
    }
}
