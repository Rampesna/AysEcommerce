<?php

namespace App\Models\Product;

use App\Models\Customer\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductVariantOption extends Model
{
    use HasFactory, SoftDeletes;

    public function customers()
    {
        return $this->belongsToMany(Customer::class,
            'customer_product_variant_option',
            'product_variant_option_id',
            'customer_id');
    }

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
