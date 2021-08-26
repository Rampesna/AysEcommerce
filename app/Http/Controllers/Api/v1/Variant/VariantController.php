<?php

namespace App\Http\Controllers\Api\v1\Variant;

use App\Contracts\Variant\IVariantRepository;
use App\Traits\Response;
use Illuminate\Routing\Controller;
use App\Http\Requests\Variant\IndexRequest;

class VariantController extends Controller
{
    use Response;

    private $variantInterface;

    public function __construct(IVariantRepository $variantInterface)
    {
        $this->categoryInterface = $variantInterface;
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
