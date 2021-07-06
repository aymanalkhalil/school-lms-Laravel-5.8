<?php

namespace App\Console;
use Closure;
use Illuminate\Support\Facades\Auth;

class websit
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
        if(Auth::check() && Auth::user()->created_at  > "2019-03-15 00:00:00"){
            return redirect('/Expiration_date');
        }
        return $next($request);
    }
}
