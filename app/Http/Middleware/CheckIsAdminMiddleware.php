<?php

namespace App\Http\Middleware;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

use Closure;

class CheckIsAdminMiddleware
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
        $role = $user->roles->first()->slug;

        if ($role == 'admin') {
            return $next($request);
        } else {
            return redirect( "/" );
        }    
    }
}
