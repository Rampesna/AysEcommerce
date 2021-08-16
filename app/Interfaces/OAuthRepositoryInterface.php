<?php

namespace App\Interfaces;

interface OAuthRepositoryInterface
{
    /**
     * @param \Illuminate\Http\Request $request
     */
    public function index(\Illuminate\Http\Request $request);
}
