<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Traits\Response;
use Closure;
use Illuminate\Http\Request;

class Authorized
{

    use Response;

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, int $permission = null)
    {
        if (!$authenticated = User::select(['token', 'role_id'])->where('token', $request->header('_token'))->first()) return $this->error('User not found');
        if (!is_null($permission) && $authenticated->authorized($permission) !== true) return $this->error('Permission denied', 403);
        return $next($request);
    }
}
