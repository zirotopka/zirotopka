<?php

namespace App\Http\Middleware;

use Closure;

class CheckToken
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
        if($request->has('api_token')){
            $api_token = $request->input('api_token');
            $project_token = env('f7f58b41e50a4af788dcd7d4a0dd51c2');
            
            if ($api_token == $project_token){
                return $next($request);
            }else{
                return response()->json(['code' => 500, 'text' => 'Error! Uncorrect token']);
            }
        }else{
            return response()->json(['code' => 500, 'text' => 'Error! Token is not find']);
        }
    }
}
