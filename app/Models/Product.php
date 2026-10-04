<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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

    protected $fillable = [
        'name',
        'price',
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
}
