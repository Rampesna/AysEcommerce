<?php

namespace App\Repositories\Auth;

use App\Contracts\Auth\IOAuthRepository;
use App\Models\Customer\Customer;
use App\Models\User\User;
use Illuminate\Support\Facades\Auth;

class OAuthRepository implements IOAuthRepository
{
    public function index(\Illuminate\Http\Request $request)
    {
        if ($request->model == 'user') {
            $user = User::where('token', $request->token)->first();
            if (!$user) return redirect()->route('user.login.index');
            Auth::guard('user')->login($user);
            return redirect()->route('user.dashboard.index');
        }

        if ($request->model == 'customer') {
            $customer = Customer::where('token', $request->token)->first();
            if (!$customer) return redirect()->route('web.login');
            Auth::guard('customer')->login($customer);
            return redirect()->route('web.product.index');
        }

        abort(404);
    }
}
