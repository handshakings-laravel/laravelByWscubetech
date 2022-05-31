<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MyGlobalMiddleware
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
        //if age is null then initialize it with 18
        //if not null then check conditin if less then 18
        $age = $request->age ?? 18;
        if($age < 18)
        {
            echo "You are not allowed to acces this page";
            die;
        }
        echo "Your age ".$age;
        return $next($request);
    }
}
