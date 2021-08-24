<?php

namespace App\Http\Controllers\Api\v1\Product;

use App\Http\Requests\ProductVariantOption\CheckRequest;
use App\Contracts\Product\IProductVariantOptionRepository;
use App\Traits\Response;
use Illuminate\Routing\Controller;

class ProductVariantOptionController extends Controller
{
    use Response;

    private $productVariantOptionInterface;

    public function __construct(IProductVariantOptionRepository $productVariantOptionInterface)
    {
        $this->productVariantOptionInterface = $productVariantOptionInterface;
    }

    public function check(CheckRequest $request)
    {
        if (!$this->checkMethod($request, ['get'])) return $this->error('Method not allowed', 405);
        return $this->productVariantOptionInterface->check(intval($request->product_id), $request->variants);
    }
}
