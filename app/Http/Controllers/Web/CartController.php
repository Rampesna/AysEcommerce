<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\AddToCartRequest;
use App\Interfaces\CartRepositoryInterface;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private $cartInterface;

    public function __construct(CartRepositoryInterface $cartInterface)
    {
        $this->cartInterface = $cartInterface;
    }

    public function addToCart(AddToCartRequest $request)
    {
        return $this->cartInterface->addToCart($request);
    }
}
