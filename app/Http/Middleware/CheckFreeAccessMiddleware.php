<?php

namespace App\Http\Middleware;

use Closure;

use App\FreeAccess;

class CheckFreeAccessMiddleware
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
        $key = $request->route('key');

        $freeAccess = FreeAccess::where('code','=',$key)->whereNull('user_id')->first();

        if (!empty($freeAccess)) {
            $request->session()->put('freeAccess', $freeAccess->id);
        }
        
        return $next($request);
    }
}
