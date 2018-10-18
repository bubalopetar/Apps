<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class CheckIfMentor
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
        $user = Auth::user();
        $userRole = $user->role;

        if ( $userRole == 'mentor' ) {
            return $next($request);
        }
        elseif ($userRole == 'student'){
            return redirect()->route('upisni_list',[$user->id]);
        }
        else{
            return $next($request);

        }
}
}
