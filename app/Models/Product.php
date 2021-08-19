<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $appends = [
        'product_variant_options'
    ];

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

    public function getProductVariantOptionsAttribute()
    {
        $response = [];
        foreach ($this->variants()->get() as $variant) {
            $options = [];

            foreach ($variant->options()->get() as $option) {
                if (ProductVariantOption::where('product_id', $this->id)->where('variant', 'like', '%~' . $option->name . '~%')->first()) $options[] = [
                    'id' => $option->id,
                    'name' => $option->name
                ];
            }

            $response[] = [
                'id' => $variant->id,
                'name' => $variant->name,
                'input_type' => $variant->input_type,
                'options' => $options
            ];
        }

        return $response;
    }
}
