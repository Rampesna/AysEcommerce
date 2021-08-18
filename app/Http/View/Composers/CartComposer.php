<?php

namespace App\Http\View\Composers;

use App\Models\Option;
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
        $this->cart = auth()->check() ? auth()->user()->cart() : null;
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
