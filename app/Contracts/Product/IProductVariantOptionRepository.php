<?php

namespace App\Contracts\Product;

use App\Http\Requests\ProductVariantOption\CheckRequest;

interface IProductVariantOptionRepository
{
    /**
     * @param int $productId
     * @param array $variants
     */
    public function check(int $productId, array $variants);
}
