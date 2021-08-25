<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('web.porto.pages.product.index.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function search(Request $request)
    {
        return view('web.porto.pages.product.search.index', [
            'keyword' => $request->keyword,
            'categoryId' => $request->category_id
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        if (!$product = Product::find($id)) abort(404);

        return view('web.porto.pages.product.show.index', [
            'product' => $product
        ]);
    }
}
