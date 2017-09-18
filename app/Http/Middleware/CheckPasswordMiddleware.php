<?php

namespace App\Http\Middleware;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

use Closure;

class CheckPasswordMiddleware
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
        $user = Sentinel::getUser();

        if (empty($user)) {
            return $next($request);
        }

        if (!empty($user->password)) {
            return $next($request);
        }

        return redirect('password');
    }
}
