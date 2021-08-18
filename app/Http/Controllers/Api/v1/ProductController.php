<?php

namespace App\Http\Controllers\Api\v1;

use App\Traits\Response;
use Illuminate\Routing\Controller;
use App\Http\Requests\Product\ShowRequest;
use App\Http\Requests\Product\IndexRequest;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Http\Requests\Product\DeleteRequest;
use App\Interfaces\ProductRepositoryInterface;

class ProductController extends Controller
{
    use Response;

    private $productInterface;

    public function __construct(ProductRepositoryInterface $productInterface)
    {
        $this->productInterface = $productInterface;
    }

    /**
     * @method get
     * @url {version}/user
     * @param IndexRequest $request
     */
    public function index(IndexRequest $request)
    {
        if (!$this->checkMethod($request, ['get'])) return $this->error('Method not allowed', 405);
        return $this->productInterface->index(
            $request->page_index ?? 0,
            $request->page_size ?? 12,
            $request->order_by ?? 'id',
            $request->order_type ?? 'desc'
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
        return $this->productInterface->show($request->id);
    }

    /**
     * @method post
     * @url {version}/user
     * @param StoreRequest $request
     */
    public function store(StoreRequest $request)
    {
        if (!$this->checkMethod($request, ['post'])) return $this->error('Method not allowed', 405);
        return $this->productInterface->store($request);
    }

    /**
     * @method put
     * @url {version}/user
     * @param UpdateRequest $request
     */
    public function update(UpdateRequest $request)
    {
        if (!$this->checkMethod($request, ['put'])) return $this->error('Method not allowed', 405);
        return $this->productInterface->update($request);
    }

    /**
     * @method delete
     * @url {version}/user/delete
     * @param DeleteRequest $request
     */
    public function destroy(DeleteRequest $request)
    {
        if (!$this->checkMethod($request, ['delete'])) return $this->error('Method not allowed', 405);
        return $this->productInterface->destroy($request->id);
    }
}
