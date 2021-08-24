<?php

namespace App\Http\Middleware;

use App\Models\Customer\Customer;
use App\Models\User\User;
use App\Traits\Response;
use Closure;
use Illuminate\Http\Request;

class Token
{
    use Response;

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $model = null)
    {
        if (is_null($request->header('_token'))) {
            return $this->error('_token is required on header');
        }

        $checked = false;

        if ($model) {
            if (ucwords($model) == 'User') {
                $checked = User::where('token', $request->header('_token'))->first();
            }

            if (ucwords($model) == 'Customer') {
                $checked = Customer::where('token', $request->header('_token'))->first();
            }
        } else {
            $checked =
                User::where('token', $request->header('_token'))->first() ??
                Customer::where('token', $request->header('_token'))->first();
        }

        if (!$checked) {
            return $this->error('Invalid _token');
        }

        return $next($request);
    }
}
