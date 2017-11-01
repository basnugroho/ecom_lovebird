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
            return redirect()->route('front');//arahkan ke beranda
        }
        return $next($request);
    }
}
