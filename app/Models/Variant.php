<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Variant extends Model
{
    use HasFactory, SoftDeletes;

    public function products()
    {
        return $this->morphedByMany(Product::class, 'variant_relation');
    }

    public function categories()
    {
        return $this->morphedByMany(Category::class, 'variant_relation');
    }
}
