<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attribute extends Model
{
    use HasFactory, SoftDeletes;

    public function options()
    {
        return $this->hasMany(AttributeOption::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
