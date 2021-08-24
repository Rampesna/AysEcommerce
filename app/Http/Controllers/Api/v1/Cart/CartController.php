<?php

namespace App\Http\Controllers\Api\v1\Cart;

use App\Contracts\Cart\ICartRepository;
use App\Traits\Response;
use Illuminate\Routing\Controller;
use App\Http\Requests\Cart\ShowRequest;
use App\Http\Requests\Cart\IndexRequest;
use App\Http\Requests\Cart\StoreRequest;
use App\Http\Requests\Cart\UpdateRequest;
use App\Http\Requests\Cart\DeleteRequest;

class CartController extends Controller
{
    use Response;

    private $cartInterface;

    public function __construct(ICartRepository $cartInterface)
    {
        $this->cartInterface = $cartInterface;
    }

    /**
     * @method get
     * @url {version}/user
     * @param IndexRequest $request
     */
    public function index(IndexRequest $request)
    {
        if (!$this->checkMethod($request, ['get'])) return $this->error('Method not allowed', 405);
        return $this->cartInterface->index(
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
        return $this->cartInterface->show($request->id);
    }

    /**
     * @method post
     * @url {version}/user
     * @param StoreRequest $request
     */
    public function store(StoreRequest $request)
    {
        if (!$this->checkMethod($request, ['post'])) return $this->error('Method not allowed', 405);
        return $this->cartInterface->store($request);
    }

    /**
     * @method put
     * @url {version}/user
     * @param UpdateRequest $request
     */
    public function update(UpdateRequest $request)
    {
        if (!$this->checkMethod($request, ['put'])) return $this->error('Method not allowed', 405);
        return $this->cartInterface->update($request);
    }

    /**
     * @method delete
     * @url {version}/user/delete
     * @param DeleteRequest $request
     */
    public function destroy(DeleteRequest $request)
    {
        if (!$this->checkMethod($request, ['delete'])) return $this->error('Method not allowed', 405);
        return $this->cartInterface->destroy($request->id);
    }
}
