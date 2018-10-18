<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class login_register
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
        if(Auth::check() and Auth::user()->role==='student')
            return redirect()->route('upisni_list',Auth::user()->id);

        elseif(Auth::check() and Auth::user()->role==='mentor')
            return redirect()->route('svi_korisnici');
        else
            return $next($request);
    }
}
