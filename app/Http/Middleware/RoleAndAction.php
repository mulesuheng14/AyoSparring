<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleAndAction
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ... $roles)
    {
        foreach($roles as $role) {
            if(Auth::user()) {
                if ($role == Auth::user()->role) {
                    return $next($request);
                }
            }
        } return redirect('/');
    }
}
