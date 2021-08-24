<?php

namespace App\Repositories\Cart;

use App\Http\Requests\Cart\StoreRequest;
use App\Http\Requests\Cart\UpdateRequest;
use App\Contracts\Cart\ICartRepository;
use App\Models\Cart\Cart;
use App\Traits\Response;

class CartRepository implements ICartRepository
{
    use Response;

    /**
     * @param int $pageIndex
     * @param int $pageSize
     * @param string $orderBy
     * @param string $orderType asc/desc
     */
    public function index(int $pageIndex = 0, int $pageSize = 10, string $orderBy = 'id', string $orderType = 'asc')
    {
        $carts = Cart::with([
            'customer',
            'items'
        ])->skip($pageIndex * $pageSize)->take($pageSize)->orderBy($orderBy, $orderType)->get();
        return $this->success($carts->count() > 0 ? 'Carts skipped ' . $pageIndex . ' and take ' . $pageSize : 'No records found', $carts);
    }

    /**
     * @param int $id
     */
    public function show($id)
    {
        $cart = Cart::with([
            'customer',
            'items'
        ])->find($id);
        if (!$cart) return $this->error('Cart not found', 404);
        return $this->success('Cart informations', $cart);
    }

    /**
     * @param StoreRequest $request
     */
    public function store(StoreRequest $request)
    {
        return $this->success('Cart saved successfully', $this->save(
            new Cart
        ));
    }

    /**
     * @param UpdateRequest $request
     */
    public function update(UpdateRequest $request)
    {
        if (!$cart = Cart::find($request->id)) return $this->error('Cart not found', 404);
        return $this->success('Cart saved successfully', $this->save(
            $cart
        ));
    }

    /**
     * @param Cart $cart
     */
    public function save(
        Cart $cart
    )
    {
        $cart->save();

        return $cart;
    }

    /**
     * @param int $id
     */
    public function destroy($id)
    {
        if (!$cart = Cart::find($id)) return $this->error('Cart not found', 404);
        $cart->delete();
        return $this->success('Cart deleted', null);
    }
}
