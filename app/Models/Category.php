<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $appends = [
        'sub_categories'
    ];

    public function getSubCategoriesAttribute()
    {
        return $this->subCategories()->get();
    }

    public function subCategories()
    {
        return $this->hasMany(Category::class);
    }

    public function variants()
    {
        return $this->morphToMany(Variant::class, 'variant_relation');
    }
}
