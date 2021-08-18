<?php

namespace App\Interfaces;

interface CartRepositoryInterface
{
    /**
     * @param \App\Http\Requests\Cart\AddToCartRequest $request
     */
    public function addToCart(\App\Http\Requests\Cart\AddToCartRequest $request);

}
