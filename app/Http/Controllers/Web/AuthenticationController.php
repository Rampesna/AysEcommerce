<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class AuthenticationController extends Controller
{
    public function login()
    {
        if (auth()->check()) return redirect()->route('web.product.index');
        return view('web.porto.auth.login');
    }

    public function logout()
    {
        auth()->guard('customer')->logout();
        request()->session()->flush();
        request()->session()->regenerate();
        return redirect()->route('web.product.index');
    }
}
