<?php

namespace App\Repositories;

use App\Http\Requests\CartItem\StoreRequest;
use App\Http\Requests\CartItem\UpdateRequest;
use App\Interfaces\CartItemRepositoryInterface;
use App\Models\CartItem;
use App\Traits\Response;

class CartItemRepository implements CartItemRepositoryInterface
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
        $cartItems = CartItem::with([
            'images'
        ])->skip($pageIndex * $pageSize)->take($pageSize)->orderBy($orderBy, $orderType)->get();
        return $this->success($cartItems->count() > 0 ? 'Cart items skipped ' . $pageIndex . ' and take ' . $pageSize : 'No records found', $cartItems);
    }

    /**
     * @param int $id
     */
    public function show($id)
    {
        $cartItem = CartItem::with([
            'cart'
        ])->find($id);
        if (!$cartItem) return $this->error('Cart item not found', 404);
        return $this->success('Cart item informations', $cartItem);
    }

    /**
     * @param StoreRequest $request
     */
    public function store(StoreRequest $request)
    {
        return $this->success('Cart item saved successfully', $this->save(
            new CartItem
        ));
    }

    /**
     * @param UpdateRequest $request
     */
    public function update(UpdateRequest $request)
    {
        if (!$cartItem = CartItem::find($request->id)) return $this->error('Cart item not found', 404);
        return $this->success('Cart item saved successfully', $this->save(
            $cartItem
        ));
    }

    /**
     * @param CartItem $cartItem
     */
    public function save(
        CartItem $cartItem
    )
    {
        $cartItem->save();

        return $cartItem;
    }

    /**
     * @param int $id
     */
    public function destroy($id)
    {
        if (!$cartItem = CartItem::find($id)) return $this->error('Cart item not found', 404);
        $cartItem->delete();
        return $this->success('Cart item deleted', null);
    }
}
