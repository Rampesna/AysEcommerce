<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Contracts\Auth\IOAuthRepository;
use Illuminate\Http\Request;

class OAuthController extends Controller
{
    private $oAuthInterface;

    public function __construct(IOAuthRepository $oAuthInterface)
    {
        $this->oAuthInterface = $oAuthInterface;
    }

    public function index(Request $request)
    {
        return $this->oAuthInterface->index($request);
    }
}
