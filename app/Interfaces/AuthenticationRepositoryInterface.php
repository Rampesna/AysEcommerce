<?php

namespace App\Interfaces;

interface AuthenticationRepositoryInterface
{
    public function generateToken();

    /**
     * @param string $email
     * @param string $password
     * @param string $model
     */
    public function login(string $email, string $password, string $model = 'user');
}
