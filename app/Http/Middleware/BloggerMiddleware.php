<?php

namespace App\Http\Middleware;

use Closure;

class BloggerMiddleware
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
        if (\Entrust::hasRole('user')) {

            //return redirect('dashboard');
            return redirect('error');

        }

         return $next($request);
    }
}
