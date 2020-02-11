<?php

namespace App\Http\Middleware;

use Closure;

class ChangePasswordMiddleware
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
        $user = auth()->user();
        if ( $user && $user->hasToChangePassword() ) {
            return redirect()->route('password.reset', ['user' => $user]);
        }
        return $next($request);
    }
}
