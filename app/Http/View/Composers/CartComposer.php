<?php

namespace App\Http\View\Composers;

use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class CartComposer
{
    /**
     *
     * @var object $cart
     */
    protected $cart;

    public function __construct()
    {
        $this->cart = auth()->check() ? auth()->user()->cart() : (Session::has('cart') ? Session::get('cart') : []);
    }

    /**
     * Bind data to the view.
     *
     * @param \Illuminate\View\View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('cart', $this->cart);
    }
}
