<?php

namespace App\Http\Middleware;

use Closure;

use App\User;

class CheckReferallMiddleware
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
        $slug = $request->route('slug');

        $user = User::select('id')->where('slug','=',$slug)->first();

        if (!empty($user)) {
            session(['referall' => $slug]);
        }
        
        return $next($request);
    }
}
