<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class adminMiddleware
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
	if(Sentinel::check() AND Sentinel::getUser()->roles()->first()->slug=="Admin")
        return $next($request);
	else
        return redirect('/');
    }
}
