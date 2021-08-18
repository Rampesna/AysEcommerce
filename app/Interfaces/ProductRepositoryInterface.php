<?php

namespace App\Interfaces;

interface ProductRepositoryInterface
{
    /**
     * @param int $pageIndex
     * @param int $pageSize
     * @param string $orderBy
     * @param string $orderType asc/desc
     */
    public function index(int $pageIndex, int $pageSize, string $orderBy, string $orderType);

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
     * @param \App\Models\Product $product
     */
    public function save(\App\Models\Product $product);

    /**
     * @param int $id
     */
    public function destroy($id);
}
