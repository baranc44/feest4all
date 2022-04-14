<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use DB;
use Illuminate\Http\Request;


class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = DB::table("users")->get("power");
        // dd($user);
        foreach($user as $user){
        if($user->power == 1){
        return $next($request);
        }else{
        return redirect('/dashboard');
        }
        }
    }
}
