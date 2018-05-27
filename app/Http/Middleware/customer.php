<?php

namespace App\Http\Middleware;

use Closure;

class customer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!auth()->check() || auth()->user()->level != 'customer'){
            return redirect('landingpage_beranda');
        }
        return $next($request);
    }
}
