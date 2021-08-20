<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CartItem extends Model
{
    use HasFactory, SoftDeletes;

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function productVariantOption()
    {
        return $this->belongsTo(ProductVariantOption::class);
    }
}
