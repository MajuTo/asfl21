<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ChangePasswordMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();
        if ( $user && $user->hasToChangePassword() ) {
            return redirect()->route('password.reset', ['user' => $user]);
        }
        return $next($request);
    }
}
