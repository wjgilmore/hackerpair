<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\RedirectResponse;

class AdminAuthentication
{

    public function handle($request, Closure $next)
    {
        if ($request->user())
        {
            if ($request->user()->is_admin == true)
            {
                return $next($request);
            }
        }

        return new RedirectResponse(url('/'));

    }

}
