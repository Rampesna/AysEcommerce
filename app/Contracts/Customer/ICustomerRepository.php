<?php

namespace App\Contracts\Customer;

interface ICustomerRepository
{
    /**
     * @param int $pageIndex
     * @param int $pageSize
     * @param string $orderBy
     * @param string $orderType asc/desc
     */
    public function index(int $pageIndex = 0, int $pageSize = 10, string $orderBy = 'id', string $orderType = 'asc');

    /**
     * @param int $id
     */
    public function show($id);

    /**
     * @param \App\Http\Requests\Customer\StoreRequest $request
     */
    public function store(\App\Http\Requests\Customer\StoreRequest $request);

    /**
     * @param \App\Http\Requests\Customer\UpdateRequest $request
     */
    public function update(\App\Http\Requests\Customer\UpdateRequest $request);

    /**
     * @param \App\Models\Customer\Customer $customer
     * @param string $name
     * @param string $email
     * @param string $password
     */
    public function save(\App\Models\Customer\Customer $customer, string $name, string $email, string $password, string $phoneNumber);

    /**
     * @param int $id
     */
    public function destroy($id);
}
