<?php

namespace App\Http\Controllers\Api\v1\Customer;

use App\Traits\Response;
use Illuminate\Routing\Controller;
use App\Http\Requests\Customer\DeleteRequest;
use App\Http\Requests\Customer\IndexRequest;
use App\Http\Requests\Customer\ShowRequest;
use App\Http\Requests\Customer\StoreRequest;
use App\Http\Requests\Customer\UpdateRequest;
use App\Contracts\Customer\ICustomerRepository;

class CustomerController extends Controller
{
    use Response;

    private $customerInterface;

    public function __construct(ICustomerRepository $customerInterface)
    {
        $this->customerInterface = $customerInterface;
    }

    /**
     * @method get
     * @url {version}/customer
     * @param IndexRequest $request
     */
    public function index(IndexRequest $request)
    {
        if (!$this->checkMethod($request, ['get'])) return $this->error('Method not allowed', 405);
        return $this->customerInterface->index(
            $request->page_index ?? 0,
            $request->page_size ?? 10,
            $request->order_by ?? 'id',
            $request->order_type ?? 'asc'
        );
    }

    /**
     * @method get
     * @url {version}/customer/show
     * @param ShowRequest $request
     */
    public function show(ShowRequest $request)
    {
        if (!$this->checkMethod($request, ['get', 'head'])) return $this->error('Method not allowed', 405);
        return $this->customerInterface->show($request->id);
    }

    /**
     * @method post
     * @url {version}/customer
     * @param StoreRequest $request
     */
    public function store(StoreRequest $request)
    {
        if (!$this->checkMethod($request, ['post'])) return $this->error('Method not allowed', 405);
        return $this->customerInterface->store($request);
    }

    /**
     * @method put
     * @url {version}/customer
     * @param UpdateRequest $request
     */
    public function update(UpdateRequest $request)
    {
        if (!$this->checkMethod($request, ['put'])) return $this->error('Method not allowed', 405);
        return $this->customerInterface->update($request);
    }

    /**
     * @method delete
     * @url {version}/customer/delete
     * @param DeleteRequest $request
     */
    public function destroy(DeleteRequest $request)
    {
        if (!$this->checkMethod($request, ['delete'])) return $this->error('Method not allowed', 405);
        return $this->customerInterface->destroy($request->id);
    }
}
