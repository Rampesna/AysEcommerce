<?php

namespace App\Models\Customer;

use App\Models\Product\ProductVariantOption;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use HasFactory, SoftDeletes, Notifiable;

    protected $guard = 'customer';

    protected $appends = [
        'basket'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'token',
        'password',
        'created_at',
        'updated_at',
        'deleted_at',
        'email_verified_at'
    ];

    public function token()
    {
        return $this->token;
    }

    public function getBasketAttribute()
    {
        return CustomerProductVariantOption::with([
            'productVariantOption' => function ($productVariantOption) {
                $productVariantOption->with([
                    'product' => function ($product) {
                        $product->with([
                            'images'
                        ]);
                    },
                ]);
            }
        ])->where('customer_id', $this->id)->get();
    }
}
