<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    public function variants()
    {
        return $this->morphToMany(Variant::class, 'variant_relation');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'relation');
    }

    public function variantOptions()
    {
        return $this->hasMany(ProductVariantOption::class);
    }
}
