<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class adminAuth
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param   \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            return $next($request);
        }
        return redirect()->to('/');
    }
}
