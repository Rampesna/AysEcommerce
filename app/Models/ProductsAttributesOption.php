<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductsAttributesOption extends Model
{
    use HasFactory, SoftDeletes;

    protected $appends = [
        'attribute_values'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getAttributeValuesAttribute()
    {
        return 'test';
    }
}
