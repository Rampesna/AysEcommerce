<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    public function login()
    {
        if (auth()->guard('user')->check()) return redirect()->route('user.dashboard.index');
        return view('user.' . theme() . '.auth.login');
    }

    public function logout()
    {
        auth()->guard('user')->logout();
        request()->session()->flush();
        request()->session()->regenerate();
        return redirect()->route('user.login.index');
    }
}
