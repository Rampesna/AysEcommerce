<?php

namespace App\Models\Customer;

use App\Models\Product\Product;
use App\Models\Product\ProductVariantOption;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerProductVariantOption extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'customer_product_variant_option';

    public function productVariantOption()
    {
        return $this->belongsTo(ProductVariantOption::class);
    }
}
