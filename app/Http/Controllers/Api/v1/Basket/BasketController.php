<?php

namespace App\Http\Controllers\Api\v1\Basket;

use App\Contracts\Customer\ICustomerProductVariantOptionRepository;
use App\Http\Requests\Basket\AddRequest;
use App\Http\Requests\Basket\DropRequest;
use App\Http\Requests\Basket\IndexRequest;
use App\Http\Requests\Basket\RemoveRequest;
use App\Traits\Response;
use Illuminate\Routing\Controller;

class BasketController extends Controller
{
    use Response;

    private $customerProductVariantOption;

    public function __construct(ICustomerProductVariantOptionRepository $customerProductVariantOption)
    {
        $this->customerProductVariantOption = $customerProductVariantOption;
    }

    public function index(IndexRequest $request)
    {
        if (!$this->checkMethod($request, ['get'])) return $this->error('Method not allowed', 405);
        return $this->customerProductVariantOption->index($request);
    }

    public function add(AddRequest $request)
    {
        if (!$this->checkMethod($request, ['post'])) return $this->error('Method not allowed', 405);
        return $this->customerProductVariantOption->add($request);
    }

    public function drop(DropRequest $request)
    {
        if (!$this->checkMethod($request, ['delete'])) return $this->error('Method not allowed', 405);
        return $this->customerProductVariantOption->drop($request);
    }

    public function remove(RemoveRequest $request)
    {
        if (!$this->checkMethod($request, ['delete'])) return $this->error('Method not allowed', 405);
        return $this->customerProductVariantOption->remove($request);
    }
}
