<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\LoginRequest;
use App\Interfaces\AuthenticationRepositoryInterface;
use App\Traits\CheckMethod;
use Illuminate\Routing\Controller;
use \App\Traits\Response;

class AuthenticationController extends Controller
{
    use Response, CheckMethod;

    private $authenticationInterface;

    public function __construct(AuthenticationRepositoryInterface $authenticationInterface)
    {
        $this->authenticationInterface = $authenticationInterface;
    }

    /**
     * @method post
     * @url {version}/authentication/login/user
     * @param LoginRequest $request
     */
    public function store(LoginRequest $request)
    {
        if ($this->checkMethod($request, ['post']) == 0) return $this->error('Method not allowed', 405);
        return $this->authenticationInterface->login(
            $request->email ?? '',
            $request->password ?? '',
            $request->model ?? 'user'
        );
    }
}
