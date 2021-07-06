<?php

namespace App\Http\Middleware;

use App\Permission;
use Closure;

class RegisterTimeMiddleware
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
        $check_availabe = Permission::where('id', 3)->first();

        if ($check_availabe->register_time == "disable") {
            return redirect()->back()->with("error", " التسجيل مغلق الآن  ");
        }
        return $next($request);
    }
}