<?php

namespace App\Models\Category;

use App\Models\Variant\Variant;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('position', function (Builder $builder) {
            $builder->orderBy('position');
        });
    }

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
