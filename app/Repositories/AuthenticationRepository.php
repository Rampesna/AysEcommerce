<?php

namespace App\Repositories;

use App\Interfaces\AuthenticationRepositoryInterface;
use App\Models\Customer;
use App\Models\User;
use App\Traits\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthenticationRepository implements AuthenticationRepositoryInterface
{
    use Response;

    public function generateToken()
    {
        return uniqid() . '-' . Str::random('16') . '-' . Str::random('8');
    }

    public function login($email, $password, $model = 'user')
    {
        $authenticated = $model == 'user' ? User::where('email', $email)->first() : ($model == 'customer' ? Customer::where('email', $email)->first() : null);

        if (!$authenticated) {
            return $this->error('User not found', 401);
        }

        if (!Hash::check($password, $authenticated->password)) {
            return $this->error('Incorrect password', 401);
        }

        if (!$authenticated->token) {
            $authenticated->token = $this->generateToken();
            $authenticated->save();
        }

        Auth::login($authenticated);

        return $this->success('Successfully logged in', [
            'token' => $authenticated->token
        ]);
    }
}
