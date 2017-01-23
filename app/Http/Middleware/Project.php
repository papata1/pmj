<?php

namespace App\Http\Middleware;

use Closure;

class Project
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
        //$role = Auth::role();
        $user = $request->user();
        if($user&&$user->project=='1'){
            return $next($request);
        }
        abort(403);
    }
}
