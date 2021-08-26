<?php

namespace App\Repositories\Product;

use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Contracts\Product\IProductRepository;
use App\Models\Category\Category;
use App\Models\Product\Product;
use App\Traits\Response;

class ProductRepository implements IProductRepository
{
    use Response;

    /**
     * @param int $pageIndex
     * @param int $pageSize
     * @param string $orderBy
     * @param string $orderType asc/desc
     */
    public function index(int $pageIndex = 0, int $pageSize = 10, string $orderBy = 'id', string $orderType = 'asc', array $params = [])
    {
        $products = Product::with([
            'images'
        ]);

        if (!empty($params['categories'])) {
            $ids = [];
            $categories = Category::whereIn('id', $params['categories'])->get();
            foreach ($categories as $category) {
                $ids = array_merge($ids, $category->products->pluck('id')->toArray());
            }
            $products->whereIn('id', array_unique($ids));
        }

        if (!empty($params['min_price'])) {
            $products->where('price', '>=', $params['min_price']);
        }

        if (!empty($params['max_price'])) {
            $products->where('price', '<=', $params['max_price']);
        }

        if (!empty($params['keyword'])) {
            $products->where(function ($product) use ($params) {
                $product->where('short_name', 'like', '%' . $params['keyword'] . '%')->orWhere('long_name', 'like', '%' . $params['keyword'] . '%');
            });
        }

        $products = $products->skip($pageIndex * $pageSize)->take($pageSize)->orderBy($orderBy, $orderType)->get()->append('product_variant_options');
        return $this->success($products->count() > 0 ? 'Products skipped ' . $pageIndex . ' and take ' . $pageSize : 'No records found', $products);
    }

    /**
     * @param int $id
     */
    public function show($id)
    {
        $product = Product::with([
            'images'
        ])->find($id)->append('product_variant_options');
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
        return $this->success('Product saved successfully', $this->save(
            $product
        ));
    }

    /**
     * @param Product $product
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
        if (!$product = Product::find($id)) return $this->error('Product not found', 404);
        $product->delete();
        return $this->success('Product deleted', null);
    }
}
