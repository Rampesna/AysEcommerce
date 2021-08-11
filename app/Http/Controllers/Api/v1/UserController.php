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
    /**
     * @OA\Schema(
     *      schema="UsersResponseSchema",
     *      @OA\Property(
     *          property="id",
     *          type="integer",
     *      ),
     *      @OA\Property(
     *          property="name",
     *          type="string",
     *      ),
     *      @OA\Property(
     *          property="email",
     *          type="string",
     *      ),
     * )
     */

    use Response, CheckMethod;

    private $userInterface;

    public function __construct(UserRepositoryInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }

    /**
     * @OA\Get(
     *      tags={"User"},
     *      path="/user",
     *      summary="Get list of users",
     *      @OA\Parameter(
     *          name="page_index",
     *          description="",
     *          in = "query",
     *          required=false,
     *          @OA\Schema(
     *              type="integer",
     *              example="0",
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="page_size",
     *          description="",
     *          in = "query",
     *          required=false,
     *          @OA\Schema(
     *              type="integer",
     *              example="10",
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="order_by",
     *          description="",
     *          in = "query",
     *          required=false,
     *          @OA\Schema(
     *              type="string",
     *              example="id",
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="order_type",
     *          description="",
     *          in = "query",
     *          required=false,
     *          @OA\Schema(
     *              type="string",
     *              example="asc",
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="",
     *          @OA\JsonContent(
     *            @OA\Property(property="message", type="integer", example="Users skipped 0 and take 10"),
     *            @OA\Property(property="error", type="string", example="false"),
     *            @OA\Property(property="code", type="integer", example="200"),
     *            @OA\Property(property="response", type="array", @OA\Items(ref="#/components/schemas/UsersResponseSchema"))
     *          ),
     *      ),
     *  ),
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
     * @OA\Get(
     *      tags={"User"},
     *      path="/user/show",
     *      summary="Get user informations",
     *      @OA\Parameter(
     *          name="id",
     *          description="",
     *          in = "query",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *              example="1",
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="",
     *          @OA\JsonContent(
     *            @OA\Property(property="message", type="integer", example="Get user informations"),
     *            @OA\Property(property="error", type="string", example="false"),
     *            @OA\Property(property="code", type="integer", example="200"),
     *            @OA\Property(property="response", type="object", ref="#/components/schemas/UsersResponseSchema")
     *          ),
     *      ),
     *  ),
     */
    public function show(UserShowRequest $request)
    {
        if (!$this->checkMethod($request, ['get', 'head'])) return $this->error('Method not allowed', 405);
        return $this->userInterface->show($request->id);
    }

    /**
     * @OA\Post(
     *      tags={"User"},
     *      path="/user",
     *      summary="Create new user",
     *      @OA\RequestBody(
     *          @OA\JsonContent(
     *            @OA\Property(property="name", type="string"),
     *            @OA\Property(property="email", type="string"),
     *            @OA\Property(property="password", type="string"),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="",
     *          @OA\JsonContent(
     *            @OA\Property(property="message", type="integer", example="User saved successfully"),
     *            @OA\Property(property="error", type="string", example="false"),
     *            @OA\Property(property="code", type="integer", example="200"),
     *            @OA\Property(property="response", type="object", ref="#/components/schemas/UsersResponseSchema")
     *          ),
     *      ),
     *  ),
     */
    public function store(UserStoreRequest $request)
    {
        if (!$this->checkMethod($request, ['post'])) return $this->error('Method not allowed', 405);
        return $this->userInterface->store($request);
    }

    /**
     * @OA\Put(
     *      tags={"User"},
     *      path="/user/update",
     *      summary="Update user",
     *      @OA\RequestBody(
     *          @OA\JsonContent(
     *            @OA\Property(property="id", type="integer"),
     *            @OA\Property(property="name", type="string"),
     *            @OA\Property(property="email", type="string"),
     *            @OA\Property(property="password", type="string"),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="",
     *          @OA\JsonContent(
     *            @OA\Property(property="message", type="integer", example="User saved successfully"),
     *            @OA\Property(property="error", type="string", example="false"),
     *            @OA\Property(property="code", type="integer", example="200"),
     *            @OA\Property(property="response", type="object", ref="#/components/schemas/UsersResponseSchema")
     *          ),
     *      ),
     *  ),
     */
    public function update(UserUpdateRequest $request)
    {
        if (!$this->checkMethod($request, ['put'])) return $this->error('Method not allowed', 405);
        return $this->userInterface->update($request);
    }

    /**
     * @OA\Delete(
     *      tags={"User"},
     *      path="/user/delete",
     *      summary="Delete user",
     *      @OA\Parameter(
     *          name="id",
     *          description="",
     *          in = "query",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *              example="1",
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="",
     *          @OA\JsonContent(
     *            @OA\Property(property="message", type="integer", example="User deleted successfully"),
     *            @OA\Property(property="error", type="string", example="false"),
     *            @OA\Property(property="code", type="integer", example="200"),
     *          ),
     *      ),
     *  ),
     */
    public function destroy(UserDeleteRequest $request)
    {
        if (!$this->checkMethod($request, ['delete'])) return $this->error('Method not allowed', 405);
        return $this->userInterface->destroy($request->id);
    }
}
