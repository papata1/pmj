<?php

namespace App\Http\Middleware;

use Closure;

class Rent
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
        if($user&&$user->rent=='1'){
            return $next($request);
        }
        abort(403);
    }
}
