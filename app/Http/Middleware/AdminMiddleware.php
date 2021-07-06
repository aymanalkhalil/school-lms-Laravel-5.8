<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next ,$role)
    {
        if(Auth::check() && Auth::user()->permission->$role == 'disable'){
            return redirect()->back()->with( "error", "لا يمكنك الدخول الي هذة الصفحة " );
        }
        return $next($request);
    }
}
