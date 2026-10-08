<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Category extends Model
{
    public function product()
    {
        return $this->hasMany(Product::class);
    }

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function (Category $category) {
        if(empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });
    }
}
