<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AdminAuth
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function handle(Request $request, Closure $next)
    {
        //dd($request);
        if (Auth::check()) {
            return $next($request);
        }else{
            return redirect('/admin');
        }
    }



}
