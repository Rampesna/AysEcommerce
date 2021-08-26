<?php

namespace App\Repositories\Category;

use App\Contracts\Category\ICategoryRepository;
use App\Models\Category\Category;
use App\Traits\Response;

class CategoryRepository implements ICategoryRepository
{
    use Response;

    /**
     * @param int $categoryId
     * @param int $pageIndex
     * @param int $pageSize
     * @param string $orderBy
     * @param string $orderType asc/desc
     */
    public function index(int $categoryId = null, int $pageIndex = 0, int $pageSize = 10, string $orderBy = 'id', string $orderType = 'asc')
    {
        $categories = Category::where('category_id', Category::find($categoryId)->category_id ?? null)->skip($pageIndex * $pageSize)->take($pageSize)->orderBy($orderBy, $orderType)->get();
        return $this->success($categories->count() > 0 ? 'Categories skipped ' . $pageIndex . ' and take ' . $pageSize : 'No records found', $categories);
    }
}
