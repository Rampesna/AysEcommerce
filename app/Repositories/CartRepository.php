<?php

namespace App\Repositories;

use App\Http\Requests\Cart\AddToCartRequest;
use App\Interfaces\CartRepositoryInterface;
use App\Traits\Response;

class CartRepository implements CartRepositoryInterface
{
    use Response;

    /**
     * @param AddToCartRequest $request
     */
    public function addToCart(AddToCartRequest $request)
    {
//        session()->pull('cart');
//
//        if (!session()->has('cart')) {
//            session()->put('cart', null);
//        }
//
//        $cart = session()->get('cart');
//
//        return $cart;
//
//        return $index = searchByValue($cart, 'id', intval($request->id));
//
//        if ($cart) {
//            return $cart;
//        } else {
//            $cart = [
//                [
//                    'id' => intval($request->id),
//                    'quantity' => intval($request->quantity)
//                ]
//            ];
//        }

        return $cart;
//
//        return $index = searchByValue($cart, 'id', intval($request->id));
//
//        return [
//            'cart' => $cart,
//            'requested_id' => $request->id,
//            'index' => $index
//        ];
//
//        if ($index) {
//            $cart[$index] = [
//                'id' => intval($request->id),
//                'quantity' => intval($cart[$index]['quantity']) + intval($request->quantity)
//            ];
//        } else {
//
//        }
//        session()->put('cart', $cart);
//        return session()->get('cart');
    }
}
