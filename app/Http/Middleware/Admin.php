<?php

namespace App\Http\Middleware;

use Closure;

use Auth;
use Session;

class Admin
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
        //dd($user);
        if(!$user->admin)
        {
            //Session::flash('info', 'You dont have permission to acces that page');
            return redirect()->route('front');
        }
        return $next($request);
    }
}
