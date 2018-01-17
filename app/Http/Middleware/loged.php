<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;

class loged
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
        $loged = Auth::check();
        //dd($user);
        if(!$loged)
        {
            return redirect()->route('customer.login');//arahkan ke login register
        }
        return $next($request);
    }
}
