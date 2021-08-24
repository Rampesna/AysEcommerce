<?php

namespace App\Contracts\Product;

interface IProductRepository
{
    /**
     * @param int $pageIndex
     * @param int $pageSize
     * @param string $orderBy
     * @param string $orderType asc/desc
     * @param array $params
     */
    public function index(int $pageIndex, int $pageSize, string $orderBy, string $orderType, array $params = []);

    /**
     * @param int $id
     */
    public function show($id);

    /**
     * @param \App\Http\Requests\Product\StoreRequest $request
     */
    public function store(\App\Http\Requests\Product\StoreRequest $request);

    /**
     * @param \App\Http\Requests\Product\UpdateRequest $request
     */
    public function update(\App\Http\Requests\Product\UpdateRequest $request);

    /**
     * @param \App\Models\Product\Product $product
     */
    public function save(\App\Models\Product\Product $product);

    /**
     * @param int $id
     */
    public function destroy($id);
}
