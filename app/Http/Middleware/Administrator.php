<?php

namespace App\Http\Middleware;

use Closure;

class Administrator
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
        // if (!Auth::guard($guard)->check()) {
        //     return redirect('/');
        // }

        // return $next($request);
        $user = $request->user();

        if ($user && $user->user_type == '0'){
            return $next($request);
        }else{
            abort(404, 'No Way');
        }
    }
}
