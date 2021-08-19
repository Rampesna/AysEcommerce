<?php

namespace App\Repositories;

use App\Http\Requests\Cart\AddToCartRequest;
use App\Interfaces\CartRepositoryInterface;
use App\Models\ProductVariantOption;
use App\Traits\Response;
use Illuminate\Support\Facades\Session;

class CartRepository implements CartRepositoryInterface
{
    use Response;

    /**
     * @param AddToCartRequest $request
     */
    public function addToCart(AddToCartRequest $request)
    {
        if (!Session::has('cart')) {
            Session::put('cart', []);
        }

        $cart = Session::get('cart');

        if ((new ProductVariantOptionRepository)->check($request->id, $request->variants)) {

        }

        $variantOption = ProductVariantOption::with([]);

        foreach ($request->variants as $variant) {
            $variantOption->where('variant', 'like', '%~' . $variant . '~%');
        }

        if ($variantOption->first()) {
            return $variantOption->first();
        } else {
            return 'yok';
        }

        $index = searchByValue($cart, 'variant_id', intval($request->id));

        if ($index == -1) {
            $cart[] = [
                'variant_id' => intval($request->id),
                'quantity' => intval($request->quantity)
            ];
        } else {
            $cart[$index]['quantity'] += intval($request->quantity);
        }

        Session::put('cart', $cart);
    }
}
