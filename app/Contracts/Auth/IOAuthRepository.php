<?php

namespace App\Contracts\Auth;

interface IOAuthRepository
{
    /**
     * @param \Illuminate\Http\Request $request
     */
    public function index(\Illuminate\Http\Request $request);
}
