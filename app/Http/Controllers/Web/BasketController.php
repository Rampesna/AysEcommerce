<?php

namespace App\Http\Controllers\Web;

use App\Contracts\Customer\ICustomerProductVariantOptionRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\Basket\AddRequest;
use App\Http\Requests\Basket\DropRequest;
use App\Http\Requests\Basket\IndexRequest;
use App\Http\Requests\Basket\RemoveRequest;
use App\Traits\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BasketController extends Controller
{
    use Response;

    private $basketInterface;

    public function __construct(ICustomerProductVariantOptionRepository $basketInterface)
    {
        $this->basketInterface = $basketInterface;
    }

    public function index(IndexRequest $request)
    {
        if (!$this->checkMethod($request, ['get'])) abort(404);
        return $this->basketInterface->indexForWeb($request);
    }

    public function add(AddRequest $request)
    {
        if (!$this->checkMethod($request, ['post'])) abort(404);
        return $this->basketInterface->addForWeb($request);
    }

    public function drop(DropRequest $request)
    {
        if (!$this->checkMethod($request, ['delete'])) abort(404);
        return $this->basketInterface->dropForWeb($request);
    }

    public function remove(RemoveRequest $request)
    {
        if (!$this->checkMethod($request, ['delete'])) abort(404);
        return $this->basketInterface->removeForWeb($request);
    }

    public function clear(Request $request)
    {
        Session::pull('basket');
    }
}
