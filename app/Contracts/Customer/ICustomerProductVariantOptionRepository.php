<?php

namespace App\Contracts\Customer;

interface ICustomerProductVariantOptionRepository
{
    /**
     * @param \App\Http\Requests\Basket\IndexRequest $request
     */
    public function index(\App\Http\Requests\Basket\IndexRequest $request);

    /**
     * @param \App\Http\Requests\Basket\AddRequest $request
     */
    public function add(\App\Http\Requests\Basket\AddRequest $request);

    /**
     * @param \App\Http\Requests\Basket\DropRequest $request
     */
    public function drop(\App\Http\Requests\Basket\DropRequest $request);

    /**
     * @param \App\Http\Requests\Basket\RemoveRequest $request
     */
    public function remove(\App\Http\Requests\Basket\RemoveRequest $request);

    /**
     * @param \App\Http\Requests\Basket\IndexRequest $request
     */
    public function indexForWeb(\App\Http\Requests\Basket\IndexRequest $request);

    /**
     * @param \App\Http\Requests\Basket\AddRequest $request
     */
    public function addForWeb(\App\Http\Requests\Basket\AddRequest $request);

    /**
     * @param \App\Http\Requests\Basket\DropRequest $request
     */
    public function dropForWeb(\App\Http\Requests\Basket\DropRequest $request);

    /**
     * @param \App\Http\Requests\Basket\RemoveRequest $request
     */
    public function removeForWeb(\App\Http\Requests\Basket\RemoveRequest $request);
}
