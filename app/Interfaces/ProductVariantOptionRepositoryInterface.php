<?php

namespace App\Interfaces;

use App\Http\Requests\ProductVariantOption\CheckRequest;

interface ProductVariantOptionRepositoryInterface
{
    /**
     * @param int $productId
     * @param array $variants
     */
    public function check(int $productId, array $variants);
}
