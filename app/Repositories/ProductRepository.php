<?php

namespace App\Repositories;

use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;
use App\Models\User;
use App\Traits\Response;

class ProductRepository implements ProductRepositoryInterface
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
        $products = Product::with([
            'images'
        ])->skip($pageIndex * $pageSize)->take($pageSize)->orderBy($orderBy, $orderType)->get();
        return $this->success($products->count() > 0 ? 'Products skipped ' . $pageIndex . ' and take ' . $pageSize : 'No records found', $products);
    }

    /**
     * @param int $id
     */
    public function show($id)
    {
        $product = Product::find($id);
        if (!$product) return $this->error('Product not found', 404);
        return $this->success('Product informations', $product);
    }

    /**
     * @param StoreRequest $request
     */
    public function store(StoreRequest $request)
    {
        return $this->success('Product saved successfully', $this->save(
            new Product
        ));
    }

    /**
     * @param UpdateRequest $request
     */
    public function update(UpdateRequest $request)
    {
        if (!$product = Product::find($request->id)) return $this->error('Product not found', 404);
        return $this->success('User saved successfully', $this->save(
            $product
        ));
    }

    /**
     * @param User $user
     * @param string $name
     * @param string $email
     * @param string $password
     */
    public function save(
        Product $product
    )
    {
        $product->save();

        return $product;
    }

    /**
     * @param int $id
     */
    public function destroy($id)
    {
        if (!$product = User::find($id)) return $this->error('Product not found', 404);
        $product->delete();
        return $this->success('Product deleted', null);
    }
}
