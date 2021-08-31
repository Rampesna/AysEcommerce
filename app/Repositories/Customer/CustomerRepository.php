<?php

namespace App\Repositories\Customer;

use App\Http\Requests\Customer\StoreRequest;
use App\Http\Requests\Customer\UpdateRequest;
use App\Contracts\Customer\ICustomerRepository;
use App\Models\Customer\Customer;
use App\Traits\Response;

class CustomerRepository implements ICustomerRepository
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
        $customers = Customer::skip($pageIndex * $pageSize)->take($pageSize)->orderBy($orderBy, $orderType)->get();
        return $this->success($customers->count() > 0 ? 'Customers skipped ' . $pageIndex . ' and take ' . $pageSize : 'No records found', $customers);
    }

    /**
     * @param int $id
     */
    public function show($id)
    {
        $customer = Customer::find($id);
        if (!$customer) return $this->error('Customer not found', 404);
        return $this->success('Customer informations', $customer);
    }

    /**
     * @param StoreRequest $request
     */
    public function store(StoreRequest $request)
    {
        return $this->success('Customer saved successfully', $this->save(
            new Customer,
            $request->name,
            $request->email,
            $request->password
        ));
    }

    /**
     * @param UpdateRequest $request
     */
    public function update(UpdateRequest $request)
    {
        if (!$customer = Customer::find($request->id)) return $this->error('Customer not found', 404);
        return $this->success('Customer saved successfully', $this->save(
            $customer,
            $request->name,
            $request->email,
            $request->password
        ));
    }

    /**
     * @param Customer $customer
     * @param string $name
     * @param string $email
     * @param string $password
     */
    public function save(
        Customer $customer,
        string   $name,
        string   $email,
        string   $password = null,
        string   $phoneNumber = null
    )
    {
        $customer->name = $name;
        $customer->email = $email;
        if ($password) $customer->password = bcrypt($password);
        $customer->save();

        return $customer;
    }

    /**
     * @param int $id
     */
    public function destroy($id)
    {
        if (!$customer = Customer::find($id)) return $this->error('Customer not found', 404);
        $customer->delete();
        return $this->success('Customer deleted', null);
    }
}
