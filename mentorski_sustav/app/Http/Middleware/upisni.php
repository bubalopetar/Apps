<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class upisni
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
       if($userRole === 'student' and $user->id!=$request->route()->parameter('id'))
           return redirect()->route('upisni_list',[$user->id]);
        return $next($request);

    }
}
