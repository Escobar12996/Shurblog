<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class DeclineNoAdminAndNoEditor
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
        if (Auth::user() != null && (Auth::user()->type == 'Administrador' || Auth::user()->type == 'Editor')) {
            return $next($request);
        }

        return redirect('/home');
    }
}
