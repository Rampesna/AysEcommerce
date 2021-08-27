<?php

namespace App\Http\Controllers\Api\v1\Product;

use App\Traits\Response;
use App\Contracts\Product\IProductRepository;
use Illuminate\Routing\Controller;
use App\Http\Requests\Product\ShowRequest;
use App\Http\Requests\Product\IndexRequest;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Http\Requests\Product\DeleteRequest;

class ProductController extends Controller
{
    use Response;

    private $productRepository;

    public function __construct(IProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @method get
     * @url {version}/user
     * @param IndexRequest $request
     */
    public function index(IndexRequest $request)
    {
        if (!$this->checkMethod($request, ['get'])) return $this->error('Method not allowed', 405);
        return $this->productRepository->index(
            $request->page_index ?? 0,
            $request->page_size ?? 12,
            $request->order_by ?? 'id',
            $request->order_type ?? 'desc',
            [
                'min_price' => $request->min_price,
                'max_price' => $request->max_price,
                'keyword' => $request->keyword,
                'categories' => $request->categories,
                'variants' => $request->variants
            ]
        );
    }

    /**
     * @method get
     * @url {version}/user/show
     * @param ShowRequest $request
     */
    public function show(ShowRequest $request)
    {
        if (!$this->checkMethod($request, ['get', 'head'])) return $this->error('Method not allowed', 405);
        return $this->productRepository->show($request->id);
    }

    /**
     * @method post
     * @url {version}/user
     * @param StoreRequest $request
     */
    public function store(StoreRequest $request)
    {
        if (!$this->checkMethod($request, ['post'])) return $this->error('Method not allowed', 405);
        return $this->productRepository->store($request);
    }

    /**
     * @method put
     * @url {version}/user
     * @param UpdateRequest $request
     */
    public function update(UpdateRequest $request)
    {
        if (!$this->checkMethod($request, ['put'])) return $this->error('Method not allowed', 405);
        return $this->productRepository->update($request);
    }

    /**
     * @method delete
     * @url {version}/user/delete
     * @param DeleteRequest $request
     */
    public function destroy(DeleteRequest $request)
    {
        if (!$this->checkMethod($request, ['delete'])) return $this->error('Method not allowed', 405);
        return $this->productRepository->destroy($request->id);
    }
}
