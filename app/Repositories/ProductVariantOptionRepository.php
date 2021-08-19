<?php

namespace App\Repositories;

use App\Interfaces\ProductVariantOptionRepositoryInterface;
use App\Models\ProductVariantOption;
use App\Traits\Response;

class ProductVariantOptionRepository implements ProductVariantOptionRepositoryInterface
{
    use Response;

    /**
     * @param int $productId
     * @param array $variants
     */
    public function check(int $productId, array $variants)
    {
        $productVariantOption = ProductVariantOption::where('product_id', $productId);
        foreach ($variants as $variant) {
            $productVariantOption->where('variant', 'like', '%~' . $variant . '~%');
        }

        $check = $productVariantOption->first();

        return $check && $check->amount > 0 ? $this->success('true', $check) : $this->error('true', 404);
    }
}
