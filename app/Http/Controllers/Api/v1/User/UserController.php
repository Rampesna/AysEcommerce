<?php

namespace App\Http\Controllers\Api\v1\User;

use App\Traits\Response;
use Illuminate\Routing\Controller;
use App\Http\Requests\User\DeleteRequest;
use App\Http\Requests\User\IndexRequest;
use App\Http\Requests\User\ShowRequest;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Contracts\User\IUserRepository;

class UserController extends Controller
{
    use Response;

    private $userInterface;

    public function __construct(IUserRepository $userInterface)
    {
        $this->middleware('authorized:1')->only([
            'index'
        ]);
        $this->userInterface = $userInterface;
    }

    /**
     * @method get
     * @url {version}/user
     * @param IndexRequest $request
     */
    public function index(IndexRequest $request)
    {
        if (!$this->checkMethod($request, ['get'])) return $this->error('Method not allowed', 405);
        return $this->userInterface->index(
            $request->page_index ?? 0,
            $request->page_size ?? 10,
            $request->order_by ?? 'id',
            $request->order_type ?? 'asc'
        );
    }

    /**
     * @method get
     * @url {version}/user/show
     * @param ShowRequest $request
     */
    public function show(ShowRequest $request)
    {
        if (!$this->checkMethod($request, ['get', 'head'])) return $this->error('Method not allowed', 405);
        return $this->userInterface->show($request->id);
    }

    /**
     * @method post
     * @url {version}/user
     * @param StoreRequest $request
     */
    public function store(StoreRequest $request)
    {
        if (!$this->checkMethod($request, ['post'])) return $this->error('Method not allowed', 405);
        return $this->userInterface->store($request);
    }

    /**
     * @method put
     * @url {version}/user
     * @param UpdateRequest $request
     */
    public function update(UpdateRequest $request)
    {
        if (!$this->checkMethod($request, ['put'])) return $this->error('Method not allowed', 405);
        return $this->userInterface->update($request);
    }

    /**
     * @method delete
     * @url {version}/user/delete
     * @param DeleteRequest $request
     */
    public function destroy(DeleteRequest $request)
    {
        if (!$this->checkMethod($request, ['delete'])) return $this->error('Method not allowed', 405);
        return $this->userInterface->destroy($request->id);
    }
}
