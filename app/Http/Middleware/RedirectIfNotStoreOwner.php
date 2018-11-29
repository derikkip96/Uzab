<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotStoreOwner
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'web-storeMerchants')
    {
        // redirect to login if store owner is unauthenticated
        if (Auth::guard($guard)->check() !== true) {
            return redirect()->back();
        }

        return $next($request);
    }
}