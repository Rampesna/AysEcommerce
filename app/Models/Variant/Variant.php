<?php

namespace App\Models\Variant;

use App\Models\Category\Category;
use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Variant extends Model
{
    use HasFactory, SoftDeletes;

    public function options()
    {
        return $this->hasMany(VariantOption::class);
    }

    public function products()
    {
        return $this->morphedByMany(Product::class, 'variant_relation');
    }

    public function categories()
    {
        return $this->morphedByMany(Category::class, 'variant_relation');
    }
}
