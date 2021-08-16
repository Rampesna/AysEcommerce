<?php

namespace App\Repositories;

use App\Interfaces\OAuthRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class OAuthRepository implements OAuthRepositoryInterface
{
    public function index(\Illuminate\Http\Request $request)
    {
        $user = User::where('token', $request->token)->first();

        if (!$user) return redirect()->route('user.login.index');

        Auth::login($user);

        return redirect()->route('user.dashboard.index');
    }
}
