<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait CheckMethod
{
    use Response;

    /**
     * @param Request $request
     * @param array $methods
     */
    public function checkMethod(Request $request, array $methods)
    {
        foreach ($methods as $method) {
            if (strtolower($request->method()) == strtolower($method)) {
                return 1;
            }
        }
        return 0;
    }
}
