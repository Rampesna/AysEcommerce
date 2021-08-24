<?php

namespace App\Contracts\Cart;

interface ICartItemRepository
{
    /**
     * @param int $pageIndex
     * @param int $pageSize
     * @param string $orderBy
     * @param string $orderType asc/desc
     */
    public function index(int $pageIndex = 0, int $pageSize = 10, string $orderBy = 'id', string $orderType = 'asc');

    /**
     * @param int $id
     */
    public function show($id);

    /**
     * @param \App\Http\Requests\CartItem\StoreRequest $request
     */
    public function store(\App\Http\Requests\CartItem\StoreRequest $request);

    /**
     * @param \App\Http\Requests\CartItem\UpdateRequest $request
     */
    public function update(\App\Http\Requests\CartItem\UpdateRequest $request);

    /**
     * @param \App\Models\Cart\CartItem $cartItem
     */
    public function save(\App\Models\Cart\CartItem $cartItem);

    /**
     * @param int $id
     */
    public function destroy($id);
}
