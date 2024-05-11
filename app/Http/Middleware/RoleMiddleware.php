<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            $access = Auth::user()->role->access;

            if(count($access))
            {
                foreach ($access as $idx => $value) {
                    if('/'.Route::current()->url == $value) {
                        return $next($request);
                    }
                }
            }

            // abort(401);
            throw new AuthorizationException('You are not authorized to perform this action.');
        } catch (\Throwable $th) {
            throw new AuthorizationException('You are not logged in');
        }
    }
}
