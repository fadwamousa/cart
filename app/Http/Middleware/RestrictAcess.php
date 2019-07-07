<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;
class RestrictAcess
{

    public function handle($request, Closure $next)
    {

        if(Auth::check() && Auth::user()->isAdmin()){
            return $next($request);
        }

        return redirect("/login");
    }
}
