<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class Role
{

    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->role!="admin")
        {
            abort(404);
        }
        else
        {
            return $next($request);
        }
    }
}
