<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MarketingController extends Controller
{
    public function index()
    {
        return view('user.' . theme() . '.pages.marketing.index');
    }
}
