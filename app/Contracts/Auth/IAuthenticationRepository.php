<?php

namespace App\Contracts\Auth;

interface IAuthenticationRepository
{
    public function generateToken();

    /**
     * @param string $email
     * @param string $password
     * @param string $model
     */
    public function login(string $email, string $password, string $model = 'user');
}
