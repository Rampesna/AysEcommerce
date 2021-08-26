<?php

namespace App\Http\Controllers\Api\v1\Category;

use App\Contracts\Category\ICategoryRepository;
use App\Traits\Response;
use Illuminate\Routing\Controller;
use App\Http\Requests\Category\IndexRequest;

class CategoryController extends Controller
{
    use Response;

    private $categoryInterface;

    public function __construct(ICategoryRepository $categoryInterface)
    {
        $this->categoryInterface = $categoryInterface;
    }

    /**
     * @method get
     * @url {version}/category
     * @param IndexRequest $request
     */
    public function index(IndexRequest $request)
    {
        if (!$this->checkMethod($request, ['get'])) return $this->error('Method not allowed', 405);
        return $this->categoryInterface->index(
            $request->category_id ?? null,
            $request->page_index ?? 0,
            $request->page_size ?? 12,
            $request->order_by ?? 'id',
            $request->order_type ?? 'desc'
        );
    }
}
