<?php

namespace App\Contracts\Cart;

interface ICartRepository
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
     * @param \App\Http\Requests\Cart\StoreRequest $request
     */
    public function store(\App\Http\Requests\Cart\StoreRequest $request);

    /**
     * @param \App\Http\Requests\Cart\UpdateRequest $request
     */
    public function update(\App\Http\Requests\Cart\UpdateRequest $request);

    /**
     * @param \App\Models\Cart\Cart $cart
     */
    public function save(\App\Models\Cart\Cart $cart);

    /**
     * @param int $id
     */
    public function destroy($id);
}
