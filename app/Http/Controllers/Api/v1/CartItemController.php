<?php

namespace App\Http\Controllers\Api\v1;

use App\Interfaces\CartItemRepositoryInterface;
use App\Traits\Response;
use Illuminate\Routing\Controller;
use App\Http\Requests\CartItem\ShowRequest;
use App\Http\Requests\CartItem\IndexRequest;
use App\Http\Requests\CartItem\StoreRequest;
use App\Http\Requests\CartItem\UpdateRequest;
use App\Http\Requests\CartItem\DeleteRequest;

class CartItemController extends Controller
{
    use Response;

    private $cartItemInterface;

    public function __construct(CartItemRepositoryInterface $cartItemInterface)
    {
        $this->cartItemInterface = $cartItemInterface;
    }

    /**
     * @method get
     * @url {version}/user
     * @param IndexRequest $request
     */
    public function index(IndexRequest $request)
    {
        if (!$this->checkMethod($request, ['get'])) return $this->error('Method not allowed', 405);
        return $this->cartItemInterface->index(
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
        return $this->cartItemInterface->show($request->id);
    }

    /**
     * @method post
     * @url {version}/user
     * @param StoreRequest $request
     */
    public function store(StoreRequest $request)
    {
        if (!$this->checkMethod($request, ['post'])) return $this->error('Method not allowed', 405);
        return $this->cartItemInterface->store($request);
    }

    /**
     * @method put
     * @url {version}/user
     * @param UpdateRequest $request
     */
    public function update(UpdateRequest $request)
    {
        if (!$this->checkMethod($request, ['put'])) return $this->error('Method not allowed', 405);
        return $this->cartItemInterface->update($request);
    }

    /**
     * @method delete
     * @url {version}/user/delete
     * @param DeleteRequest $request
     */
    public function destroy(DeleteRequest $request)
    {
        if (!$this->checkMethod($request, ['delete'])) return $this->error('Method not allowed', 405);
        return $this->cartItemInterface->destroy($request->id);
    }
}
