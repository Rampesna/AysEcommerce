<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\AddToCartRequest;
use App\Contracts\Cart\ICartRepository;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function create()
    {
        return view('web.porto.pages.cart.create.index');
    }
}
