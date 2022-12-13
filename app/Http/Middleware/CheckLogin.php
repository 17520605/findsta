<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckLogin
{
    public function handle($request,Closure $next)
    {
        if(!get_data_user('web'))
        {
            return redirect()->route('get.login');
        }
        return $next($request);
    }
}
