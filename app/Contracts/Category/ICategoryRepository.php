<?php

namespace App\Contracts\Category;

interface ICategoryRepository
{
    /**
     * @param int $categoryId
     * @param int $pageIndex
     * @param int $pageSize
     * @param string $orderBy
     * @param string $orderType asc/desc
     */
    public function index(int $categoryId = null, int $pageIndex = 0, int $pageSize = 10, string $orderBy = 'id', string $orderType = 'asc');

}
