<?php

namespace App\Models\Product;

use App\Models\Image\Image;
use App\Models\Variant\Variant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    public static $withoutAppends = false;

    public function scopeWithoutAppends($query)
    {
        self::$withoutAppends = true;

        return $query;
    }

    protected function getArrayableAppends()
    {
        if (self::$withoutAppends) {
            return [];
        }

        return parent::getArrayableAppends();
    }

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
