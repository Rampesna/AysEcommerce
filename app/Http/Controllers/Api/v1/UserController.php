<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\UserDeleteRequest;
use App\Http\Requests\UserShowRequest;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Interfaces\UserRepositoryInterface;
use App\Traits\CheckMethod;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use \App\Traits\Response;

class UserController extends Controller
{
    use Response, CheckMethod;

    private $userInterface;

    public function __construct(UserRepositoryInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }

    /**
     * @method get
     * @url {version}/user
     * @param Request $request
     */
    public function index(Request $request)
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
     * @param UserShowRequest $request
     */
    public function show(UserShowRequest $request)
    {
        if (!$this->checkMethod($request, ['get', 'head'])) return $this->error('Method not allowed', 405);
        return $this->userInterface->show($request->id);
    }

    /**
     * @method post
     * @url {version}/user
     * @param UserStoreRequest $request
     */
    public function store(UserStoreRequest $request)
    {
        if (!$this->checkMethod($request, ['post'])) return $this->error('Method not allowed', 405);
        return $this->userInterface->store($request);
    }

    /**
     * @method put
     * @url {version}/user
     * @param UserUpdateRequest $request
     */
    public function update(UserUpdateRequest $request)
    {
        if (!$this->checkMethod($request, ['put'])) return $this->error('Method not allowed', 405);
        return $this->userInterface->update($request);
    }

    /**
     * @method delete
     * @url {version}/user/delete
     * @param UserDeleteRequest $request
     */
    public function destroy(UserDeleteRequest $request)
    {
        if (!$this->checkMethod($request, ['delete'])) return $this->error('Method not allowed', 405);
        return $this->userInterface->destroy($request->id);
    }
}
