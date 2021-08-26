<?php

namespace App\Repositories\Variant;

use App\Contracts\Variant\IVariantRepository;
use App\Models\Variant\Variant;
use App\Traits\Response;

class VariantRepository implements IVariantRepository
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
        $variants = Variant::with([
            'options'
        ])->where('filterable', 1)->skip($pageIndex * $pageSize)->take($pageSize)->orderBy($orderBy, $orderType)->get();
        return $this->success($variants->count() > 0 ? 'Variants skipped ' . $pageIndex . ' and take ' . $pageSize : 'No records found', $variants);
    }
}
