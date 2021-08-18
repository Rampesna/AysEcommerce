<?php

namespace App\Http\Controllers\Api\v1;

use App\Traits\Response;
use Illuminate\Routing\Controller;
use App\Http\Requests\Authentication\LoginRequest;
use App\Interfaces\AuthenticationRepositoryInterface;

class AuthenticationController extends Controller
{
    use Response;

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
    public function login(LoginRequest $request)
    {
        if ($this->checkMethod($request, ['post']) == 0) return $this->error('Method not allowed', 405);
        return $this->authenticationInterface->login(
            $request->email ?? '',
            $request->password ?? '',
            $request->model ?? 'user'
        );
    }
}
